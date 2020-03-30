<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use App\Category;
use App\Board;

class HomeController extends BaseController
{
    public function index()
    {   $data = [];
        $categories = Category::select('id','name','slug','image','alt')->where('status', 1)->orderByRaw('home_sort')->limit(6)->get();
        $boards = Board::select('id','name','slug','image','alt','s_description','designation')->where('status', 1)->where('h_status', 1)->orderByRaw('sort')->limit(6)->get();
        $data['categories'] = $categories;
        $data['boards'] = $boards;
        return view('web.home.index',$data);
    }
    public function showalleditorial($slug = null)
    {
     $data = [];
     $categories = Category::select('id','name','slug')->where('status', 1)->orderBy('ined_sort', 'DESC')->get();
     $boards = Board::where('status', 1)->orderByRaw('sort')->get();
     $data['boards'] = $boards;
     $data['categories'] = $categories;
     $data['slug'] = $slug;
     return view('web.board.index',$data);
    }
}
