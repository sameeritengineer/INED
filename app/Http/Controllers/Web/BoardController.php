<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use App\Category;
use App\Board;
use App\News;
use App\Team;

class BoardController extends BaseController
{
   public function showalleditorial($slug = null)
    {
     $sidebar = $this->sidebar();  	
     $data = [];
     $boards = Board::where('status', 1)->orderByRaw('sort')->get();
     $data['boards'] = $boards;
     $data['sidebar'] = $sidebar;
     $data['slug'] = $slug;
     return view('web.board.index',$data);
    }
    public function categoryeditorial($categorySlug)
    {
     $sidebar = $this->sidebar(); 	
     $data = [];
     $getcategory = Category::select('id','name')->where('slug',$categorySlug)->first();
     $boards = Board::where('status', 1)->where('category_id',$getcategory->id)->orderByRaw('sort')->get();
     if(count($boards) > 0){
      $data['boards'] = $boards;
      $data['sidebar'] = $sidebar;
      $data['slug'] = 'right_sidebar';
      return view('web.board.index',$data);
     }else{
     	$data['categoryName'] = $getcategory->name;
       return view('web.comingsoon.coming',$data);
     }
    }
    public function sidebar(){
      $data = [];

     $board_data_categories = Board::select('category_id')->where('category_id','<>',NULL)->get();
     $board_categories = Category::select('id','name','slug')->whereIn('id', $board_data_categories)->where('status', 1)->orderByRaw('home_sort')->limit(6)->get();
      $categories = Category::select('id','name','slug')->where('cat_parent_id',0)->where('status', 1)->orderByRaw('home_sort')->limit(6)->get();
     $recent_categories = Category::select('id','name','slug')->where('cat_parent_id',0)->where('status', 1)->orderBy('id', 'DESC')->limit(5)->get();	
     $recent_news = News::select('id','name','url')->where('status',1)->where('upcoming',1)->orderBy('id', 'DESC')->limit(5)->get();
     $teams = Team::get();
     $data['categories'] = $categories;
     $data['board_categories'] = $board_categories;
     $data['recent_categories'] = $recent_categories;
     $data['recent_news'] = $recent_news;
     $data['team_count'] = count($teams);
     return $data;
    }

}
