<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use App\Team;
use App\Member;
use App\Category;

class TeamController extends BaseController
{
    public function index($category)
    {   
        $data = [];
        $category = Category::where('slug', $category)->get()->first();
        $editor = Team::where('status', 1)
                     ->where('category_id', $category ->id)
                     ->where('team_type_id', 1)
                     ->orderByRaw('sort')->get();
        $contributor = Team::where('status', 1)
                     ->where('category_id', $category ->id)
                     ->where('team_type_id', 2)
                     ->orderByRaw('sort')->get();
        $members = Member::where('status', 1)->orderByRaw('sort')->get();
        $data['teams'] = $editor;
        $data['teams1'] = $contributor;
        $data['members'] = $members;
        if(count($editor)>0)
        	return view('web.team.index',$data);
        else
        	return view('web.team.coming',$data);
    }
}
