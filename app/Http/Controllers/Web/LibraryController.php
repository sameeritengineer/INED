<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use App\Category;
use App\Board;
use App\Library;
use App\ContentType;
use App\News;
use App\Team;

class LibraryController extends BaseController
{
    public function index()
    {   
        $sidebar = $this->sidebar();
        $data = [];
        $typecount = [];
        $categories = Category::select('id','name','slug','image','alt')->where('cat_parent_id',0)->where('status', 1)->orderByRaw('ined_sort')->limit(6)->get();
        $content_types = ContentType::get();
        foreach($categories as $cats){
            foreach($content_types as $types){
              $articleList = Library::where('status',1)->where('category_id',$cats->id)->where('content_type_id',$types->id)->get();
              $typecount[$cats->name][$types->name] = $articleList->count();
            }
        }
         $data['categories'] = $categories;
         $data['sidebar'] = $sidebar;
         $data['types'] = $typecount;
         return view('web.library.index',$data);
    }
    public function single($categorySlug,$typeSlug)
    {
       $sidebar = $this->sidebar();
       $data = [];
       $getcategoryData = Category::select('id','name')->where('slug',$categorySlug)->first();
       $gettypeData = ContentType::select('id')->where('name',$typeSlug)->first();
       $libraryList = Library::where('status',1)->where('category_id',$getcategoryData->id)->where('content_type_id',$gettypeData->id)->get();
       $data['libraries'] = $libraryList;
       $data['categoryName'] = $getcategoryData->name;
       $data['sidebar'] = $sidebar;
       $data['categorySlug'] = $categorySlug;
       $data['typeSlug'] = $typeSlug;
       if(count($data['libraries']) > 0){
          if($gettypeData->id == 1){
           return view('web.library.video',$data);
           }elseif($gettypeData->id == 2){
            return view('web.library.presentation',$data);
           }else{
               return view('web.library.article',$data);
           }
       }else{
           return view('web.library.coming',$data);
       }
    }
    public function videodetail($categorySlug,$typeSlug,$slug)
    {
        $data = [];
        $library = Library::where('status',1)->where('slug',$slug)->first();
        $getcategoryData = Category::select('id','name')->where('slug',$categorySlug)->first();
        $gettypeData = ContentType::select('id')->where('name',$typeSlug)->first();
        $libraryList = Library::select('id','name','slug','url','upload')->where('status',1)->where('category_id',$getcategoryData->id)->where('content_type_id',$gettypeData->id)->orderBy('id', 'DESC')->limit(5)->get();
        $recent_news = News::select('id','name','url')->where('status',1)->where('upcoming',1)->orderBy('id', 'DESC')->limit(5)->get();
        $data['library'] = $library;
        $data['libraryList'] = $libraryList;
        $data['recent_news'] = $recent_news;
        $data['categorySlug'] = $categorySlug;
        $data['typeSlug'] = $typeSlug;
        if($typeSlug == 'videos'){
          return view('web.library.video-detail',$data);
        }elseif($typeSlug == 'presentation'){
          return view('web.library.presentation-detail',$data);
        }
    }

    public function detail($categorySlug)
    {
        $sidebar = $this->sidebar();
        $data = [];
        $getcategoryData = Category::select('id','name')->where('slug',$categorySlug)->first();
        $content_types = ContentType::get();
        $typedata = [];
        $count = 0;
        foreach($content_types as $types){
              $articleList = Library::where('status',1)->where('category_id',$getcategoryData->id)->where('content_type_id',$types->id)->get();
              $count = $count+count($articleList);
              $typedata[$types->name] = $articleList;
        }
        $data['typedata'] = $typedata;
        $data['categoryName'] = $getcategoryData->name;
        $data['count'] = $count;
        $data['sidebar'] = $sidebar;
        if($data['count'] > 0){
         return view('web.library.detail',$data);
        }else{
          return view('web.library.coming',$data);
        }
    }
    public function sidebar(){
      $data = [];
      $categories = Category::select('id','name','slug')->where('cat_parent_id',0)->where('status', 1)->orderByRaw('ined_sort')->limit(6)->get();
      $recent_categories = Category::select('id','name','slug')->where('cat_parent_id',0)->where('status', 1)->orderBy('id', 'DESC')->limit(5)->get();
      $recent_news = News::select('id','name','url')->where('status',1)->where('upcoming',1)->orderBy('id', 'DESC')->limit(5)->get();
      $teams = Team::get();
        $data['categories'] = $categories;
        $data['recent_categories'] = $recent_categories;
        $data['recent_news'] = $recent_news;
        $data['team_count'] = count($teams);
        return $data;
    }
}
