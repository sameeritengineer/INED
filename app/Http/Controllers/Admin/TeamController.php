<?php

namespace App\Http\Controllers\Admin;

use App\Team;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teams = Team::get();
        return view('admin.team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = [];
        $categories = Category::where('cat_parent_id',0)->get();
        $data['categories'] = $categories;
        return view('admin.team.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
        ]);
        $params = $request->input();
        if($params['sort'] == null){
        $params['sort'] = 0;
        }
        $success = true;
        $dbError = [];
        try {

        $teamExists = Team::where('name', $params['name'])->get()->first();

            if ($teamExists) {
                $success = false;
                $dbError = [
                    'error' => '',
                    'msg' => "Team Member already exists"
                ];
            }else{
            if ($request->hasFile('image'))
              {
                    $file      = $request->file('image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('admin/upload/team'), $picture);
              }else{
                    $picture = 'dummy.jpg';
              }
              $team = Team::create([
                'name' => trim($params['name']),
                'slug' => trim($params['slug']),
                'education' => trim($params['education']),
                'designation' => trim($params['designation']),
                'location' => trim($params['location']),
                'description' => trim($params['description']),
                'alt' => trim($params['alt']),
                'image' => $picture,
                'category_id' => $params['c_id'],
                'subcategory_id' => $params['s_id'],
                'meta_title' => trim($params['meta_title']),
                'meta_keyword' => trim($params['meta_keyword']),
                'meta_description' => trim($params['meta_description']),
                'sort' => trim($params['sort']),
                'status' => trim($params['status']),
            ]);
            }
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t create new Team Member'
                ];
            }
         //dd($dbError);
        if($success == true){
          return redirect()->back()->with('success','Team Member Created Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
        $data = [];
        $categories = Category::where('cat_parent_id',0)->get();
        $subcategories = Category::where('cat_parent_id',$team->category_id)->get();
        $data['teams'] = $team;
        $data['categories'] = $categories;
        $data['subcategories'] = $subcategories;
        return view('admin.team.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $teamId)
    {
        //
         $params = $request->input();
        if($params['sort'] == null){
        $params['sort'] = 0;
        }
        $success = true;
        $dbError = [];
     try {

               $teamToBeUpdated = Team::find($teamId);
               //dd($libraryToBeUpdated);
               if ($request->hasFile('image'))
              {
                    $file      = $request->file('image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('admin/upload/team'), $picture);
              }else{
                    $picture = $teamToBeUpdated->image;
              }
                $updateFields = [
                'name' => trim($params['name']),
                'slug' => trim($params['slug']),
                'education' => trim($params['education']),
                'designation' => trim($params['designation']),
                'location' => trim($params['location']),
                'description' => trim($params['description']),
                'alt' => trim($params['alt']),
                'image' => $picture,
                'category_id' => $params['c_id'],
                'subcategory_id' => $params['s_id'],
                'meta_title' => trim($params['meta_title']),
                'meta_keyword' => trim($params['meta_keyword']),
                'meta_description' => trim($params['meta_description']),
                'sort' => trim($params['sort']),
                'status' => trim($params['status']),
                    ];
            $teamToBeUpdated->update($updateFields);
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t Update Team Member'
                ];
            }
        if($success == true){
          return redirect()->back()->with('success','Team Member Updated Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }
}
