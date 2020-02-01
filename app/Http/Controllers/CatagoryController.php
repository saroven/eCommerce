<?php

namespace App\Http\Controllers;
use App\Categories;
use Log;

use Illuminate\Http\Request;

class CatagoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::simplepaginate(10);
        return view('admin.categories.view', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|min:3|max:20',
            'description' => 'sometimes|nullable|string'
        ]);
        try {
            if (empty($request->description)) {
            $data = array(
                'title' => $request->title,
                'created_at' => date('Y-m-d H:i:s')
            );
        }else{
            $data = array(
                'title' => $request->title,
                'description' => $request->description,
                'created_at' => date('Y-m-d H:i:s')
            );
        }
        Categories::insert($data);
        return redirect()->route('category.index')->withsuccess('Category Created Succefull.');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->withInput()->withErrors('Something Went Wrong! Please Try Again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'This is single catagory page of '.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Categories::findOrFail($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Categories::findOrFail($id);
        $this->validate($request, [
            'title' => 'required|string|min:3|max:20',
            'description' => 'sometimes|nullable|string'
        ]);
        try {
            if (empty($request->description)) {
            $data = array(
                'title' => $request->title,
                'updated_at' => date('Y-m-d H:i:s')
            );
        }else{
            $data = array(
                'title' => $request->title,
                'description' => $request->description,
                'updated_at' => date('Y-m-d H:i:s')
            );
        }
        Categories::where('id', $id)->update($data);
        return redirect()->route('category.index')->withsuccess('Category Updated Succefull.');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->withInput()->withErrors('Something Went Wrong! Please Try Again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Categories::findOrFail($id);
            Categories::where('id', $id)->delete();
            return redirect()->back()->withsuccess('Category Deleted Succefull');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->withErrors('Something Went Wrong! Please Try Again.');

        }
    }
}
