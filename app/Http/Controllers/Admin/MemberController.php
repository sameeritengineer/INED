<?php

namespace App\Http\Controllers\Admin;

use App\Member;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $members = Member::get();
        return view('admin.member.index',compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.member.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        $params = $request->input();
        if($params['sort'] == null){
        $params['sort'] = 0;
        }
        $success = true;
        $dbError = [];
        try {

        $memberExists = Member::where('name', $params['name'])->get()->first();

            if ($memberExists) {
                $success = false;
                $dbError = [
                    'error' => '',
                    'msg' => "Member already exists"
                ];
            }else{
            if ($request->hasFile('image'))
              {
                    $file      = $request->file('image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('admin/upload/member'), $picture);
              }else{
                    $picture = 'dummy.jpg';
              }
              $member = Member::create([
                'name' => trim($params['name']),
                'slug' => trim($params['slug']),
                'description' => trim($params['description']),
                'alt' => trim($params['alt']),
                'image' => $picture,
                'meta_title' => trim($params['meta_title']),
                'meta_keyword' => trim($params['meta_keyword']),
                'meta_description' => trim($params['meta_description']),
                'sort' => trim($params['sort']),
                'status' => trim($params['status']),
            ]);
            }
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t create new Member'
                ];
            }
         //dd($dbError);
        if($success == true){
          return redirect()->back()->with('success','Member Created Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
        $data = [];
        $data['members'] = $member;
        return view('admin.member.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$memberId)
    {
        //
        $params = $request->input();
        if($params['sort'] == null){
        $params['sort'] = 0;
        }
        $success = true;
        $dbError = [];
     try {

               $memberToBeUpdated = Member::find($memberId);
               //dd($libraryToBeUpdated);
               if ($request->hasFile('image'))
              {
                    $file      = $request->file('image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('admin/upload/member'), $picture);
              }else{
                    $picture = $memberToBeUpdated->image;
              }
                $updateFields = [
                'name' => trim($params['name']),
                'slug' => trim($params['slug']),
                'description' => trim($params['description']),
                'alt' => trim($params['alt']),
                'image' => $picture,
                'meta_title' => trim($params['meta_title']),
                'meta_keyword' => trim($params['meta_keyword']),
                'meta_description' => trim($params['meta_description']),
                'sort' => trim($params['sort']),
                'status' => trim($params['status']),
                    ];
            $memberToBeUpdated->update($updateFields);
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t Update Member'
                ];
            }
        if($success == true){
          return redirect()->back()->with('success','Member Updated Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
        $member->delete();
        return redirect()->back()->with('success','Member Deleted Succesfully');
    }
}
