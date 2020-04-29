<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use App\News;
use App\Category;
use App\Team;

class NewsController extends BaseController
{
    public function index()
    { 
       $sidebar = $this->sidebar();  	  
        $data = [];
        $news = News::select('id','name','slug','image','alt','url','date')->where('status', 1)->orderByRaw('sort')->paginate(10);
        $data['news'] = $news;
        $data['sidebar'] = $sidebar;
        return view('web.news.index',$data);
    }
    public function sidebar(){
      $data = [];
     $categories = Category::select('id','name','slug')->where('cat_parent_id',0)->where('status', 1)->orderByRaw('home_sort')->limit(6)->get();
     $recent_categories = Category::select('id','name','slug')->where('cat_parent_id',0)->where('status', 1)->orderBy('id', 'DESC')->limit(5)->get();	
     $recent_news = News::select('id','name','url')->where('status',1)->whereNotIn('upcoming',[1])->orderBy('id', 'DESC')->limit(5)->get();
     $upcoming_events = News::select('id','name','url')->where('status',1)->whereIn('upcoming',[1])->orderBy('id', 'DESC')->limit(5)->get();
     $teams = Team::get();
     $data['categories'] = $categories;
     $data['recent_categories'] = $recent_categories;
     $data['recent_news'] = $recent_news;
     $data['upcoming_events'] = $upcoming_events;
     $data['team_count'] = count($teams);
     return $data;
    }
}
