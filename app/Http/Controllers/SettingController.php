<?php

namespace App\Http\Controllers;
use App\Setting;
use Log;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $setting = Setting::first();
        if (empty($setting->id)) 
        {

        return view('admin.settings.add');

        }
        else
        {
          return view('admin.settings.edit', compact('setting'));

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $this->validate($request,[
                'title' => 'required|string|min:4|max:150',
                'tagline' => 'string|min:10|max:250',
                'about' => 'required|string|min:10',
                'location' => 'required|string:max:300',
                'url' => 'required|url|max:150',
                'email' => 'sometimes|email',
                'icon' => 'sometimes|image',
                'logo' => 'sometimes|nullable|image'

            ]);

        try {
            if (!empty($request->icon)) {
                $iconpath = 'icon'.'-'.rand('1234567',8).'.'.request()->icon->getClientOriginalExtension();
                $request->icon->move(public_path('img'), $iconpath);
            } else {
                $iconpath = '';
            }

            if (!empty($request->logo)) {
                $logopath = 'logo'.'-'.rand('1234567',8).'.'.request()->logo->getClientOriginalExtension();
                $request->logo->move(public_path('img'), $logopath);
            } else {
                $logopath ='';
            }
            
            

            $data= array(
                'title' =>  $request->title,
                'tagline' =>  $request->tagline,
                'about' => $request->about,
                'location' => $request->location,
                'url' => $request->url,
                'email' => $request->email,
                'logo' => $logopath,
                'icon' => $iconpath
            );

        Setting::insert($data);
        return redirect()->back()->withsuccess('Information Added Successfull.');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->withInput()->withErrors('Somehthing Went Wrong! Please Try Again.');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $setting = Setting::findOrFail($id);
         $this->validate($request,[
                'title' => 'required|string|min:4|max:150',
                'tagline' => 'string|min:10|max:250',
                'about' => 'required|string|min:10',
                'location' => 'required|string:max:300',
                'url' => 'required|url|max:150',
                'email' => 'sometimes|email',
                'icon' => 'sometimes|image',
                'logo' => 'sometimes|nullable|image'

            ]);

        try {

            if (!empty($request->icon)) {
                // delete current icon
                $image_path = $setting->icon;
                if(file_exists($image_path)) {
                    @unlink($image_path);
                }

                $iconpath = 'icon'.'-'.rand('1234567',8).'.'.request()->icon->getClientOriginalExtension();
                $request->icon->move(public_path('img'), $iconpath);

            } else {
                
                $iconpath = $setting->icon;
            }

            if (!empty($request->logo)) {
                // delete current logo 
                $image_path = $setting->logo;
                if(file_exists($image_path)) {
                    @unlink($image_path);
                }

                $logopath = 'logo'.'-'.rand('1234567',8).'.'.request()->logo->getClientOriginalExtension();
                $request->logo->move(public_path('img'), $logopath);

            } else {

                $logopath =$setting->logo;
            }
            
            

            $data= array(
                'title' =>  $request->title,
                'tagline' =>  $request->tagline,
                'about' => $request->about,
                'location' => $request->location,
                'url' => $request->url,
                'email' => $request->email,
                'logo' => $logopath,
                'icon' => $iconpath
            );


        Setting::where('id', $id)->update($data);

        return redirect()->back()->withsuccess('Information Updated Successfull.');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->withInput()->withErrors('Somehthing Went Wrong! Please Try Again.');
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
        //
    }
}
