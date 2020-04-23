<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use App\Category;
use App\Board;
use App\News;
use App\Banner;

class HomeController extends BaseController
{
    public function index()
    {   $data = [];
        $categories = Category::select('id','name','slug','image','alt')->where('cat_parent_id',0)->where('status', 1)->orderByRaw('home_sort')->limit(6)->get();
        $boards = Board::select('id','name','slug','image','alt','s_description','designation')->where('status', 1)->where('h_status', 1)->orderByRaw('sort')->limit(6)->get();
        $news = News::select('id','name','slug','image','alt','url','date')->where('status', 1)->orderByRaw('sort')->limit(9)->get();
        $banner = Banner::select('id','description','redirect_url','image')->where('status', 1)->orderByRaw('sort')->get();
        $data['categories'] = $categories;
        $data['boards'] = $boards;
        $data['news'] = $news;
        $data['banner'] = $banner;
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
    public function coming()
    {
      return view('web.pages.coming');
    } 
    public function search(Request $request)
    {
      $data = [];  
      $search = $request->search;
      $categories = Category::where('name','LIKE',$search)->where('status', 1)->get();
      $boards   = Board::where('name','LIKE',"%{$search}%")->orWhere('l_description', 'LIKE', "%{$search}%")->where('status', 1)->get();
      $total_cat = count($categories);
      $total_board = count($boards);
      $total = $total_cat+$total_board;
      $data['categories'] = $categories;
      $data['boards'] = $boards;
      $data['search'] = $search;
      $data['total'] = $total;
      return view('web.pages.search',$data);
    }   

}
