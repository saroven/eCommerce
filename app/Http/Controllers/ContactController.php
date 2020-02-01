<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;

use Log;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('id', 'desc')->Paginate(10);
        return view('admin.contact.view', compact('contacts'));
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $contact = Contact::findOrFail($id);
        
        $contact->read_unread = 0;
        $contact->save();

        return view('admin.contact.read', compact('contact'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::findOrFail($id);
        try {
        Contact::where('id', $id)->delete();
        return redirect()->route('contact.index')->with('success', 'Deleted Successfull.');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->withErrors('Something Went Wrong ! Please Try Again.');
        }
    }
}
