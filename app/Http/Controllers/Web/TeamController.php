<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Web\BaseController;
use App\Team;
use App\Member;

class TeamController extends BaseController
{
    public function index()
    {   
        $data = [];
        $teams = Team::where('status', 1)->orderByRaw('sort')->get();
        $members = Member::where('status', 1)->orderByRaw('sort')->get();
        $data['teams'] = $teams;
        $data['members'] = $members;
        return view('web.team.index',$data);
    }
}
