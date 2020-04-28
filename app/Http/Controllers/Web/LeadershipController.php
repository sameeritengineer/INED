<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use App\Member;

class LeadershipController extends BaseController
{
    public function index()
    {   
        $data = [];
        $members = Member::where('status', 1)->orderByRaw('sort')->get();
        $data['members'] = $members;
        if(count($members)>0)
        	return view('web.leadership.index',$data);
        else
        	return view('web.leadership.coming',$data);
    }
}
