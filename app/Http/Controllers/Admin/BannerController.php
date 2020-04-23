<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $banner = Banner::get();
        return view('admin.banner.index',compact('banner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.banner.create');
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
            'image' => 'required',
        ]);
        $params = $request->input();
        if($params['sort'] == null){
        $params['sort'] = 0;
        }
        $success = true;
        $dbError = [];
        try {
            if ($request->hasFile('image'))
              {
                    $file      = $request->file('image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('admin/upload/banner'), $picture);
              }else{
                    $picture = 'dummy.jpg';
              }
              $Banner = Banner::create([
                'description' => trim($params['description']),
                'alt' => trim($params['alt']),
                'image' => $picture,
                'meta_title' => trim($params['meta_title']),
                'meta_keyword' => trim($params['meta_keyword']),
                'meta_description' => trim($params['meta_description']),
                'sort' => trim($params['sort']),
                'status' => trim($params['status']),
                'redirect_url' => trim($params['redirect_url']),
            ]);
       
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t create new Banner'
                ];
            }
         //dd($dbError);
        if($success == true){
          return redirect()->back()->with('success','Banner Created Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $Banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $Banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $Banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
        $data = [];
        $data['banners'] = $banner;
        return view('admin.banner.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $Banner
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request,$bannnerId)
    {
        //
        $params = $request->input();
        if($params['sort'] == null){
        $params['sort'] = 0;
        }
        $success = true;
        $dbError = [];
     try {

               $bannerToBeUpdated = Banner::find($bannnerId);
               //dd($libraryToBeUpdated);
               if ($request->hasFile('image'))
              {
                    $file      = $request->file('image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('admin/upload/banner'), $picture);
              }else{
                    $picture = $bannerToBeUpdated->image;
              }
                $updateFields = [
                'description' => trim($params['description']),
                'alt' => trim($params['alt']),
                'image' => $picture,
                'meta_title' => trim($params['meta_title']),
                'meta_keyword' => trim($params['meta_keyword']),
                'meta_description' => trim($params['meta_description']),
                'sort' => trim($params['sort']),
                'status' => trim($params['status']),
                'redirect_url' => trim($params['redirect_url']),
            ];
            $bannerToBeUpdated->update($updateFields);
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t Update Banner'
                ];
            }
        if($success == true){
          return redirect()->back()->with('success','Banner Updated Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        } 
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $Banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
        $banner->delete();
        return redirect()->back()->with('success','Banner Deleted Succesfully');
    }
}
