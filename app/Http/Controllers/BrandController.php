<?php

namespace App\Http\Controllers;
use App\Brand;
use Log;

use Illuminate\Http\Request;

class BrandController extends Controller
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
        $brands = Brand::simplepaginate(10);
        return view('admin.brand.view', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.add');
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
        Brand::insert($data);
        return redirect()->route('brand.index')->withsuccess('Brand Added Succefull.');
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
        return 'This is single Brand page of '.$id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brand.edit', compact('brand'));
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
        Brand::findOrFail($id);
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
        Brand::where('id', $id)->update($data);
        return redirect()->route('brand.index')->withsuccess('Brand Updated Succefull.');
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
            Brand::findOrFail($id);
            Brand::where('id', $id)->delete();
            return redirect()->back()->withsuccess('Brand Deleted Succefull');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->withErrors('Something Went Wrong! Please Try Again.');

        }
    }
}
