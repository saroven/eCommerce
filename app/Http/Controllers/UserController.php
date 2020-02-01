<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Gender;
use Log;
use Illuminate\Http\Request;

class UserController extends Controller
{


    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {
        $users = User::simplePaginate(10);
        return view('admin.user.view', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $roles = Role::pluck('title', 'id');
        $genders = Gender::pluck('title', 'id');
        return view('admin.user.add', compact('roles', 'genders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:3|max:150',
            'email' => 'required|unique:users,email|max:255',
            'password' => 'min:6|required_with:repassword|same:repassword',
            'repassword' => 'min:6',
            'role_id' => 'required|integer|exists:roles,id',
            'gender_id' => 'required|integer|exists:genders,id',
        ]);

        try {
            $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role_id' => $request->role_id,
                'gender_id' => $request->gender_id,
                'created_at' => date('Y-m-d H:i:s')

            );
            User::insert($data);
            return redirect()->route('user.index')->withsuccess('User Created Successfull');

        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->withInput()->withErrors('SomeThing Went Wrong! Please Try Again.');
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
        $user = User::findOrFail($id);
        return view('admin.user.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('title', 'id');
        $genders = Gender::pluck('title', 'id');
        return view('admin.user.edit', compact('user', 'roles', 'genders'));
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
        $user = User::findOrFail($id);
        if (isset($request->password)) {
            $request->validate([
            'name' => 'required|string|min:3|max:150',
            'email' => 'required|max:150|unique:users,email,'.$user->id,
            'password' => 'min:6|required_with:repassword|same:repassword',
            'repassword' => 'min:6',
            'role_id' => 'required|integer|exists:roles,id',
            'gender_id' => 'required|integer|exists:genders,id',
        ]);
            $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $request->role_id,
            'gender_id' => $request->gender_id,
             'updated_at' => date('Y-m-d H:i:s')

        );
        
        }else{
                 $request->validate([
                'name' => 'required|string|min:3|max:150',
                'email' => 'required|max:150|unique:users,email,'.$user->id,
                'role_id' => 'required|integer|min:1'
            ]);
                $data = [
                'name' => $request->name,
                'email' => $request->email,
                'role_id' => $request->role_id,
                'updated_at' => date('Y-m-d H:i:s')
        ];
        }
        try {
        User::where('id', $id)->update($data);
            return redirect()->route('user.index')->withsuccess('User Updated Successfull');

        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->withInput()->withErrors('SomeThing Went Wrong! Please Try Again.');
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
        User::findOrFail($id);

        try {
             User::where('id', $id)->delete();
             return redirect()->route('user.index')->withsuccess('User Deleted Successfull');

        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->withInput()->withErrors('SomeThing Went Wrong! Please Try Again.');

        }
    }

}
