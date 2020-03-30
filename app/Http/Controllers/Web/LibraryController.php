<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Category;
use App\Board;
use App\Library;
use App\ContentType;

class LibraryController extends BaseController
{
    public function index()
    {   
        $data = [];
        $typecount = [];
        $categories = Category::select('id','name','slug','image','alt')->where('status', 1)->orderByRaw('home_sort')->simplePaginate(2);
        $content_types = ContentType::get();
        foreach($categories as $cats){
            foreach($content_types as $types){
              $articleList = Library::where('status',1)->where('category_id',$cats->id)->where('content_type_id',$types->id)->get();
              $typecount[$cats->name][$types->name] = $articleList->count();
            }
        }
         $data['categories'] = $categories;
         $data['types'] = $typecount;
         return view('web.library.index',$data);
    }
    public function single($categorySlug,$typeSlug)
    {
       $data = [];
       $categories = Category::select('id','name','slug')->where('status', 1)->orderBy('ined_sort', 'DESC')->get(); 
       $getcategoryData = Category::select('id','name')->where('slug',$categorySlug)->first();
       $gettypeData = ContentType::select('id')->where('name',$typeSlug)->first();
       $libraryList = Library::where('status',1)->where('category_id',$getcategoryData->id)->where('content_type_id',$gettypeData->id)->get();
       $data['libraries'] = $libraryList;
       $data['categoryName'] = $getcategoryData->name;
       $data['categories'] = $categories;
       if($gettypeData->id == 1){
           return view('web.library.video',$data);
       }else{
           return view('web.library.article',$data);
       }
    }
    public function detail($categorySlug)
    {
        $categories = Category::select('id','name','slug','image','alt')->where('status', 1)->orderBy('ined_sort', 'DESC')->get();
        $getcategoryData = Category::select('id','name')->where('slug',$categorySlug)->first();
        $content_types = ContentType::get();
        $typedata = [];
        foreach($content_types as $types){
              $articleList = Library::where('status',1)->where('category_id',$getcategoryData->id)->where('content_type_id',$types->id)->get();
              $typedata[$types->name] = $articleList;
        }
        $data['categories'] = $categories;
        $data['typedata'] = $typedata;
        $data['categoryName'] = $getcategoryData->name;
        return view('web.library.detail',$data);
    }
}
