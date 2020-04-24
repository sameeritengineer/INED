<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use App\Lead;
use App\Users_general;
use App\Countries;
use App\Subscriber;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;
use Session;
use Mail;

class LoginController extends BaseController
{

    public function index()
    {   
      $country = Countries::where('status', 1)->orderBy('country_name', 'asc')->get();
      return view('web.login.index',["country"=>$country]);
    }
    public function store(Request $request)
    {   
    
       $validate = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'password' => 'required',
        ]);

       $success = true;
       $dbError = [];
       $params = $request->input();
       try {
            $boardExists = Users_general::where('email', $params['email'])->get()->first();
            if ($boardExists) {
                $success = false;
                $dbError = [
                    'error' => '',
                    'msg' => "Email id already exists"
                ];
            } else {
                $is_contributor = '0';
                $role = 2;
                if( isset($params['is_contributor'] ) ){
                    $is_contributor = '1';
                    $role = 3;
                }
                $lead = Users_general::create([
                  'name' => trim($params['name']),
                  'email' => trim($params['email']),
                  'country' => trim($params['country']),
                  'password' => bin2hex($params['password']),
                  'is_contributor' => $is_contributor,
                  'is_email_verified' => '0',
                  'role' =>  $role
              ]);
              $success = true;
            }
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'There some error to sign up.'
                ];
            }
        if($success == true){
          ini_set('max_execution_time', 300);
          $string = date('d-m-Y H:i:s')."#".$params['email'];
          $encrypted = bin2hex($string);
          $createLink = url('/')."/verified/".$encrypted;
          $data = array(
               'subject'=> "Sign up",
               'to' => array('mohd.gulam@yngmedia.com'),
               'bcc' => array('mohd.gulam@yngmedia.com'),
               'link' => $createLink
          );
          Mail::send('web.emails.sign-up',$data, function($message) use ($data){
                $message->from('info@inedsys.com');
                $message->to($data['to']);
                $message->bcc($data['bcc']);
                $message->subject($data['subject']);
          });
          return redirect()->back()->with('success','Thanks for sign up');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        }    

    }

    public function verified($value)
    {   
        $decrypted = hex2bin($value);
        $urlArray = explode("#",$decrypted);
        if(count($urlArray) > 0){
            $time = $urlArray[0];
            $email = $urlArray[1];
            $userData = Users_general::where('email', $email)->get()->first();
            if(!empty($userData)){
                if($userData->is_email_verified == '0' || empty($userData->is_email_verified) ) {
                    $affectedRows = Users_general::where('id',$userData->id)->update(array('is_email_verified' => '1'));
                    $message = "Your email address has been verified succesfully. Thank you.";
                    return view('web.login.verify',["message"=>$message]);
                } else if($userData->is_email_verified == '1'){
                    $message = "Your email address has already been verified. Thank you.";
                    return view('web.login.verify',["message"=>$message]);
                } 
            } else {
                $message = "Invalid URL. Please contact inedsysinfo@gmail.com";
                return view('web.login.verify',["message"=>$message]);
            }
        } else {
          $message = "Invalid URL. Please contact inedsysinfo@gmail.com";
          return view('web.login.verify',["message"=>$message]);
        }
    }

      public function signin()
    {   
       return view('web.login.signin');
    }

        public function signinauth(Request $request)
    {   
    
       $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

       $success = true;
       $dbError = [];
       $params = $request->input();
       try {
            $usersData = Users_general::where('email', $params['email'])->where('password', bin2hex($params['password']))->get()->first();
            if (!empty($usersData)) {
                if($usersData->is_email_verified == 0){
                    $success = false;
                    $dbError = [
                        'error' => '',
                        'msg' => "Email id not verify"
                    ];
                } else if($usersData->status == 2){
                    $success = false;
                    $dbError = [
                        'error' => '',
                        'msg' => "your id is permanently disabled"
                    ];
                } else {
                    session([
                       'userId' => $usersData->id,
                       'userEmail' => $usersData->email,
                       'userName' => $usersData->name,
                       'userRole' => $usersData->role,
                       'isContributor' => $usersData->is_contributor,
                    ]);
                    $success = true;
                    $dbError = [
                        'error' => '',
                        'msg' => "success"
                    ];
                }
            } else {
                $success = false;
                $dbError = [
                    'error' => '',
                    'msg' => "User name and password do not match"
                ];
            }
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'There some error to sign up.'
                ];
            }
        if($success == true){
          $data = Session::all();
          return redirect('/');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        }    

    }

     public function logout(Request $request)
    {   
       $request->session()->forget('userEmail');
       $request->session()->forget('userName');
       $request->session()->forget('userRole');
       $request->session()->forget('isContributor');
       $request->session()->forget('userId');
       return redirect(url('/sign-in'));
    }

    
}
