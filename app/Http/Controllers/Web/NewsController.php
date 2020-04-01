<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use App\News;

class NewsController extends BaseController
{
    public function index()
    {   
      $data = [];
        $news = News::select('id','name','slug','image','alt','url','date')->where('status', 1)->orderByRaw('sort')->paginate(10);
        $data['news'] = $news;
        return view('web.news.index',$data);
    }
}
