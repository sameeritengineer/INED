<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Library;
use App\Board;
use App\News;
use App\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('admin.category.index',compact('categories'));
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
        return view('admin.category.create',$data);
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
            'cat_name' => 'required',
        ]);   
     $params = $request->input();
     if($params['cat_home_sort'] == null || $params['cat_ined_sort'] == null){
        $params['cat_home_sort'] = 0;
        $params['cat_ined_sort'] = 0;
     }
     $success = true;
     $dbError = [];
     try {

        $catExists = Category::where('name', $params['cat_name'])->get()->first();

            if ($catExists) {
                $success = false;
                $dbError = [
                    'error' => '',
                    'msg' => "category already exists"
                ];
            }else{
              if ($request->hasFile('image'))
              {
                    $file      = $request->file('image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('admin/upload/category'), $picture);
                    
                    // $file      = $request->file('uploadfilname');
                    // $filename  = $file->getClientOriginalName();
                    // $image = $request->image;
                    // list($type, $image) = explode(';', $image);
                    // list(, $image)      = explode(',', $image);
                    // $image = base64_decode($image);
                    // $picture= date('His').$filename;
                    // $path = public_path('admin/upload/test/'.$picture);
                    // file_put_contents($path, $image);
              }else{
                    $picture = 'dummy.jpg';
              }  
              $category = Category::create([
                'name' => trim($params['cat_name']),
                'slug' => trim($params['cat_slug']),
                'description' => trim($params['cat_description']),
                'alt' => trim($params['cat_image_alt']),
                'image' => $picture,
                'cat_parent_id' => trim($params['cat_parent_id']),
                'meta_title' => trim($params['meta_title']),
                'meta_keyword' => trim($params['meta_keyword']),
                'meta_description' => trim($params['meta_description']),
                'home_sort' => trim($params['cat_home_sort']),
                'ined_sort' => trim($params['cat_ined_sort']),
                'status' => trim($params['status'])
            ]);
            }
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t create new Category'
                ];
            }
         //dd($dbError);
        if($success == true){
          return redirect()->back()->with('success','Category Created Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        //dd($category);
        $parent_categories = Category::where('cat_parent_id',0)->get();
        return view('admin.category.edit',compact('category','parent_categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $categoryId)
    {
        //
        //dd($categoryId);
        $params = $request->input();
        if($params['cat_home_sort'] == null || $params['cat_ined_sort'] == null){
        $params['cat_home_sort'] = 0;
        $params['cat_ined_sort'] = 0;
     }
     $success = true;
     $dbError = [];
     try {
         $categoryToBeUpdated = Category::find($categoryId);
         if ($request->hasFile('image'))
              {
                    $file      = $request->file('image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('admin/upload/category'), $picture);
                    if($uploadSuccess){
                        $file_path = public_path('admin/upload/category/').$categoryToBeUpdated->image;
                        unlink($file_path);
                    }
              }else{
                    $picture = $categoryToBeUpdated->image;
              }
                $updateFields = [
                        'name' => trim($params['cat_name']),
                        'slug' => trim($params['cat_slug']),
                        'description' => trim($params['cat_description']),
                        'alt' => trim($params['cat_image_alt']),
                        'image' => $picture,
                        'cat_parent_id' => trim($params['cat_parent_id']),
                        'meta_title' => trim($params['meta_title']),
                        'meta_keyword' => trim($params['meta_keyword']),
                        'meta_description' => trim($params['meta_description']),
                        'home_sort' => trim($params['cat_home_sort']),
                        'ined_sort' => trim($params['cat_ined_sort']),
                        'status' => trim($params['status'])
                    ];
            $categoryToBeUpdated->update($updateFields);
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t Update Category'
                ];
            }
        if($success == true){
          return redirect()->back()->with('success','Category Updated Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        }    

        //dd($categoryToBeUpdated);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        //dd($category);
        if($category->delete()){
         if($category->cat_parent_id == 0){
          Board::where('category_id', $category->id)->update(array('category_id' => NULL,'subcategory_id' => NULL));
          Library::where('category_id', $category->id)->update(array('category_id' => NULL,'subcategory_id' => NULL));
          News::where('category_id', $category->id)->update(array('category_id' => NULL,'subcategory_id' => NULL));
          Team::where('category_id', $category->id)->update(array('category_id' => NULL,'subcategory_id' => NULL));
          }else{
          Board::where('subcategory_id', $category->id)->update(array('subcategory_id' => NULL));  
          Library::where('subcategory_id', $category->id)->update(array('subcategory_id' => NULL));
          News::where('subcategory_id', $category->id)->update(array('subcategory_id' => NULL));
          Team::where('subcategory_id', $category->id)->update(array('subcategory_id' => NULL));
          }
        }

        //$category->delete();
        return redirect()->back()->with('success','Category Deleted Succesfully');
    }
    public function subcategories(Request $request)
    {
        $cat_id = $request->c_id;
        $sub_categories = Category::where('cat_parent_id',$cat_id)->get();
        $values = '';
        $values .='<option value="">Sub-Category</option>';
        foreach($sub_categories as $subcat){
            $values .='<option value="'.$subcat->id.'">'.$subcat->name.'</option>';
        }
        return $values;
    }
}
