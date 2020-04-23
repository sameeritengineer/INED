<?php

namespace App\Http\Controllers\Admin;

use App\Users_general;
use App\Library;
use App\Board;
use App\News;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use DB;

class UsersGeneralController extends Controller
{

    public function index()
    {
        $users = Users_general::get();
        return view('admin.users.index',compact('users'));
    }

     public function edit($userId)
    {

        $user = Users_general::where('id', $userId)->get()->first();
        return view('admin.users.edit',compact('user'));
    }

    public function update(Request $request, $userId)
    {

     $params = $request->input();
     $success = true;
     $dbError = [];
     try {
            $user = Users_general::where('id', $userId)->get()->first();
            if(!empty($user)){
                Users_general::where('id', $userId)->update(array('status' =>$params['status'] ));
                if($user->is_contributor == 1 && $user->role == 3){
                    $admin = User::where('email', $user->email)->get()->first(); 
                    if($params['status']  == 1){
                        if(empty($admin)){
                            $userData = User::create([
                                'name' => $user->name,
                                'email' => $user->email,
                                'password' => Hash::make(hex2bin($user->password)),
                            ]);
                            $userRoleData = array(
                                'user_id' => $userData->id,
                                'role_id' => 3,
                                'created_at' => date('Y-m-d H:i:s'),
                            );
                            DB::table('role_user')->insert($userRoleData);
                        } 
                    } else {
                        if(!empty($admin)){
                            DB::delete("delete from users where id = '".$admin->id."' ");
                            DB::delete("delete from role_user where user_id = '".$admin->id."' ");
                        }
                    }
                }
                $success = true;
            }
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t Update user'
                ];
            }
        if($success == true){
          return redirect()->back()->with('success','User Updated Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        }    

        //dd($categoryToBeUpdated);
    }


}
