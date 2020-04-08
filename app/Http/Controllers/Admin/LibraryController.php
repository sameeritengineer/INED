<?php

namespace App\Http\Controllers\Admin;

use App\Library;
use App\Category;
use App\ContentType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LibraryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $libraries = Library::get();
        return view('admin.library.index',compact('libraries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [];
        $categories = Category::where('cat_parent_id',0)->get();
        $type = ContentType::get();
        $data['categories'] = $categories;
        $data['types'] = $type;
        return view('admin.library.create',$data);
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
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'video' => ['mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts|max:100040']
        ]);
        $params = $request->input();
        $success = true;
        $dbError = [];
        try {

        $catExists = Library::where('name', $params['name'])->get()->first();

            if ($catExists) {
                $success = false;
                $dbError = [
                    'error' => '',
                    'msg' => "Library already exists"
                ];
            }else{
             if ($request->hasFile('image'))
              {
                    $file      = $request->file('image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('admin/upload/library'), $picture);
              }else{
                    $picture = 'dummy.jpg';
              }
              if ($request->hasFile('upload'))
              {
                    if($request->videoPreviews){
                    $vimage = $request->videoPreviews;
                    list($type, $vimage) = explode(';', $vimage);
                    list(, $vimage)      = explode(',', $vimage);
                    $vimage = base64_decode($vimage);
                    $vpicture= date('His').'.png';
                    $vpath = public_path('admin/upload/library/video'.$vpicture);
                    file_put_contents($vpath, $vimage);
                    }else{
                      $vpicture = NULL;
                    }
                    $videofile      = $request->file('upload');
                    $videofilename  = $videofile->getClientOriginalName();
                    $videoextension = $videofile->getClientOriginalExtension();
                    $video   = date('His').'-'.$videofilename;
                    $uploadSuccess = $videofile->move(public_path('admin/upload/library/video'), $video);
              }else{
                   $video = NULL;
                   $vpicture = NULL;
              }
              $library = Library::create([
                'content_type_id' => trim($params['content_type_id']),
                'name' => trim($params['name']),
                'slug' => trim($params['slug']),
                'description' => trim($params['description']),
                'alt' => trim($params['alt']),
                'image' => $picture,
                'subscription_type' => trim($params['sub_type_id']),
                'url' => (isset($params['url'])?$params['url']:NULL),
                'alt' => trim($params['alt']),
                'category_id' => $params['c_id'],
                'subcategory_id' => $params['s_id'],
                'upload' => $video,
                'meta_title' => trim($params['meta_title']),
                'meta_keyword' => trim($params['meta_keyword']),
                'meta_description' => trim($params['meta_description']),
                'status' => trim($params['status']),
                'videoimage' => $vpicture,
            ]);
            }
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t create new Library'
                ];
            }
        if($success == true){
          return redirect()->back()->with('success','Library Created Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        }     
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function show(Library $library)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function edit(Library $library)
    {
        //
        //dd($library);
        $data = [];
        $categories = Category::where('cat_parent_id',0)->get();
        $subcategories = Category::where('cat_parent_id',$library->category_id)->get();
        $type = ContentType::get();
        $data['library'] = $library;
        $data['categories'] = $categories;
        $data['subcategories'] = $subcategories;
        $data['types'] = $type;
        $data['libraries'] = $library;
        return view('admin.library.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $libraryId)
    {
        //
        //dd($request->all());
        $params = $request->input();
        $success = true;
        $dbError = [];
     try {

               $libraryToBeUpdated = Library::find($libraryId);
               //dd($libraryToBeUpdated);
               if ($request->hasFile('image'))
              {
                    $file      = $request->file('image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('admin/upload/library'), $picture);
              }else{
                    $picture = $libraryToBeUpdated->image;
              }
              if($request->hasFile('upload'))
              {
                    if($request->videoPreviews){
                    $vimage = $request->videoPreviews;
                    list($type, $vimage) = explode(';', $vimage);
                    list(, $vimage)      = explode(',', $vimage);
                    $vimage = base64_decode($vimage);
                    $vpicture= date('His').'.png';
                    $vpath = public_path('admin/upload/library/video'.$vpicture);
                    file_put_contents($vpath, $vimage);
                    }else{
                      $vpicture = NULL;
                    }

                    $videofile      = $request->file('upload');
                    $videofilename  = $videofile->getClientOriginalName();
                    $videoextension = $videofile->getClientOriginalExtension();
                    $video   = date('His').'-'.$videofilename;
                    $uploadSuccess = $videofile->move(public_path('admin/upload/library/video'), $video);
              }else{
                if(isset($params['url'])){
                $video = NULL;
                }else{
                  $video = $libraryToBeUpdated->upload;
                }
                   $vpicture = NULL;
              }
                $updateFields = [
                'content_type_id' => trim($params['content_type_id']),
                'name' => trim($params['name']),
                'slug' => trim($params['slug']),
                'description' => trim($params['description']),
                'alt' => trim($params['alt']),
                'image' => $picture,
                'subscription_type' => trim($params['sub_type_id']),
                'url' => trim($params['url']),
                'alt' => trim($params['alt']),
                'category_id' => $params['c_id'],
                'subcategory_id' => $params['s_id'],
                'upload' => $video,
                'meta_title' => trim($params['meta_title']),
                'meta_keyword' => trim($params['meta_keyword']),
                'meta_description' => trim($params['meta_description']),
                'status' => trim($params['status']),
                'videoimage' => $vpicture,
                    ];
            $libraryToBeUpdated->update($updateFields);
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t Update Library'
                ];
            }
        if($success == true){
          return redirect()->back()->with('success','Library Updated Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Library  $library
     * @return \Illuminate\Http\Response
     */
    public function destroy(Library $library)
    {
        //
        $library->delete();
        return redirect()->back()->with('success','Library Deleted Succesfully');
    }
}
