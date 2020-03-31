<?php

namespace App\Http\Controllers\Admin;

use App\Board;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $boards = Board::get();
        return view('admin.board.index',compact('boards'));
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
        return view('admin.board.create',$data);
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
        //dd($request->all());
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

        $boardExists = Board::where('name', $params['name'])->get()->first();

            if ($boardExists) {
                $success = false;
                $dbError = [
                    'error' => '',
                    'msg' => "Editoral Board already exists"
                ];
            }else{
            if ($request->hasFile('image'))
              {
                    $file      = $request->file('image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('admin/upload/board'), $picture);
              }else{
                    $picture = 'dummy.jpg';
              }
              $board = Board::create([
                'name' => trim($params['name']),
                'slug' => trim($params['slug']),
                'designation' => trim($params['designation']),
                's_description' => trim($params['s_description']),
                'l_description' => trim($params['l_description']),
                'alt' => trim($params['alt']),
                'image' => $picture,
                'category_id' => $params['c_id'],
                'subcategory_id' => $params['s_id'],
                'meta_title' => trim($params['meta_title']),
                'meta_keyword' => trim($params['meta_keyword']),
                'meta_description' => trim($params['meta_description']),
                'sort' => trim($params['sort']),
                'status' => trim($params['status']),
                'h_status' => trim($params['hstatus'])
            ]);
            }
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t create new Category'
                ];
            }
         //dd($dbError);
        if($success == true){
          return redirect()->back()->with('success','Editorial Board Created Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        } 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function show(Board $board)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function edit(Board $board)
    {
        //
        $data = [];
        $categories = Category::where('cat_parent_id',0)->get();
        $subcategories = Category::where('cat_parent_id',$board->category_id)->get();
        $data['boards'] = $board;
        $data['categories'] = $categories;
        $data['subcategories'] = $subcategories;
        return view('admin.board.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $boardId)
    {
        //
        $params = $request->input();
        if($params['sort'] == null){
        $params['sort'] = 0;
        }
        $success = true;
        $dbError = [];
     try {

               $boardToBeUpdated = Board::find($boardId);
               //dd($libraryToBeUpdated);
               if ($request->hasFile('image'))
              {
                    $file      = $request->file('image');
                    $filename  = $file->getClientOriginalName();
                    $extension = $file->getClientOriginalExtension();
                    $picture   = date('His').'-'.$filename;
                    $uploadSuccess = $file->move(public_path('admin/upload/board'), $picture);
              }else{
                    $picture = $boardToBeUpdated->image;
              }
                $updateFields = [
                'name' => trim($params['name']),
                'slug' => trim($params['slug']),
                'designation' => trim($params['designation']),
                's_description' => trim($params['s_description']),
                'l_description' => trim($params['l_description']),
                'alt' => trim($params['alt']),
                'image' => $picture,
                'category_id' => $params['c_id'],
                'subcategory_id' => $params['s_id'],
                'meta_title' => trim($params['meta_title']),
                'meta_keyword' => trim($params['meta_keyword']),
                'meta_description' => trim($params['meta_description']),
                'sort' => trim($params['sort']),
                'status' => trim($params['status']),
                'h_status' => trim($params['hstatus'])
                    ];
            $boardToBeUpdated->update($updateFields);
         }catch (Throwable $e) {
                $success = false;
                $dbError = [
                    'error' => $e->errorInfo,
                    'msg' => 'Can\'t Update Editoral Board'
                ];
            }
        if($success == true){
          return redirect()->back()->with('success','Editorial Board Updated Succesfully');
        }else{
          return redirect()->back()->with('error', $dbError['msg']);
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Board  $board
     * @return \Illuminate\Http\Response
     */
    public function destroy(Board $board)
    {
        //
        $board->delete();
        return redirect()->back()->with('success','Editorial Board Deleted Succesfully');
    }
}
