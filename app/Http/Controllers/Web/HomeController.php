<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use App\Category;
use App\Board;
use App\News;

class HomeController extends BaseController
{
    public function index()
    {   $data = [];
        $categories = Category::select('id','name','slug','image','alt')->where('cat_parent_id',0)->where('status', 1)->orderByRaw('home_sort')->limit(6)->get();
        $boards = Board::select('id','name','slug','image','alt','s_description','designation')->where('status', 1)->where('h_status', 1)->orderByRaw('sort')->limit(6)->get();
        $news = News::select('id','name','slug','image','alt','url','date')->where('status', 1)->orderByRaw('sort')->limit(9)->get();
        $data['categories'] = $categories;
        $data['boards'] = $boards;
        $data['news'] = $news;
        return view('web.home.index',$data);
    }
    public function about()
    {
      return view('web.pages.about');
    }
    public function privacy()
    {
      return view('web.pages.privacy');
    }
    public function term()
    {
      return view('web.pages.term');
    }  
    public function team()
    {
      return view('web.pages.coming');
    } 
    public function search(Request $request)
    {
      $data = [];  
      $search = $request->search;
      $categories = Category::where('name','LIKE',"%{$search}%")->where('status', 1)->get();
      $boards   = Board::where('name','LIKE',"%{$search}%")->orWhere('l_description', 'LIKE', "%{$search}%")->where('status', 1)->get();
      $data['categories'] = $categories;
      $data['boards'] = $boards;
      $data['search'] = $search;
      return view('web.pages.search',$data);
    }   

}
