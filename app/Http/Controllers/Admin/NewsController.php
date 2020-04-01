<?php

namespace App\Http\Controllers\Admin;
use App\News;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $news = News::get();
        return view('admin.news.index',compact('news'));
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
        $data['categories'] = $categories;
        return view('admin.news.create',$data);
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
        ]);   
     $params = $request->input();
     $success = true;
     $dbError = [];
     try {

        $newsExists = News::where('name', $params['name'])->get()->first();

            if ($newsExists) {
                $success = false;
                $dbError = [
                    'error' => '',
                    'msg' => "News already already exists"
                ];
            }else{
                if($params['sort'] == null){
                  $params['sort'] = 0;
                  }
              if ($request->hasFile('image'))
              {
                    $file      = $request->file('image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('admin/upload/news'), $picture);
              }else{
                    $picture = 'dummy.jpg';
              }  
              $news = News::create([
                'name' => trim($params['name']),
                'slug' => trim($params['slug']),
                'description' => trim($params['description']),
                'url' => trim($params['url']),
                'alt' => trim($params['alt']),
                'image' => $picture,
                'category_id' => $params['c_id'],
                'subcategory_id' => $params['s_id'],
                'meta_title' => trim($params['meta_title']),
                'meta_keyword' => trim($params['meta_keyword']),
                'meta_description' => trim($params['meta_description']),
                'sort' => trim($params['sort']),
                'status' => trim($params['status']),
                'date' => date("Y-m-d", strtotime(trim($params['date'])) )
            ]);
            }
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t create new News & category'
                ];
            }
         //dd($dbError);
        if($success == true){
          return redirect()->back()->with('success','News Created Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
        $data = [];
        $categories = Category::where('cat_parent_id',0)->get();
        $subcategories = Category::where('cat_parent_id',$news->category_id)->get();
        $data['news'] = $news;
        $data['categories'] = $categories;
        $data['subcategories'] = $subcategories;
        return view('admin.news.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $newsId)
    {
        //
        $params = $request->input();
        $success = true;
        $dbError = [];
     try {

             $newsdToBeUpdated = News::find($newsId);
              if($params['sort'] == null){
                  $params['sort'] = 0;
              }
               if ($request->hasFile('image'))
              {
                    $file      = $request->file('image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('admin/upload/news'), $picture);
              }else{
                    $picture = $newsdToBeUpdated->image;
              }
                $updateFields = [
                'name' => trim($params['name']),
                'slug' => trim($params['slug']),
                'description' => trim($params['description']),
                'url' => trim($params['url']),
                'alt' => trim($params['alt']),
                'image' => $picture,
                'category_id' => $params['c_id'],
                'subcategory_id' => $params['s_id'],
                'meta_title' => trim($params['meta_title']),
                'meta_keyword' => trim($params['meta_keyword']),
                'meta_description' => trim($params['meta_description']),
                'sort' => trim($params['sort']),
                'status' => trim($params['status']),
                'date' => date("Y-m-d", strtotime(trim($params['date'])) )
                    ];
            $newsdToBeUpdated->update($updateFields);
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t Update News and Events'
                ];
            }
        if($success == true){
          return redirect()->back()->with('success','News and Events Updated Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
        $news->delete();
        return redirect()->back()->with('success','News & Event Deleted Succesfully');
    }
}
