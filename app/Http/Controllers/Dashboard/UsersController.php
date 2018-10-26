<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        return view('dashboard.users.listUsers')->with('users', $users);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.addUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = new User();
        User::validator($request->all())->validate();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->created_by = Auth::id();

        if ($request->hasfile('img')) {
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $filename = time() . $name;
            $file->move('storage/users/', $filename);
            $user->img = $filename;
        }

        $user->save();
        $user->attachRole('user');

        return redirect()->route('users.index')->with('alert_sucesss', 'User was added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if ($user == null) {
            abort(404);
        }
        return view('dashboard.users.userProfile')->with('user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if ($user == null) {
            abort(404);
        }
        return view('dashboard.users.editUser')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if ($request->input('username') != $user->username) {
            $username = User::userValidator($request->all())->validate();
            $user->username = $username['username'];
        }
        if ($request->input('email') != $user->email) {
            $email = User::emailValidator($request->all())->validate();
            $user->email = $email['email'];
        }
        if ($request->input('password') != $user->password) {
            $password = User::passwordValidator($request->all())->validate();
            $user->password = $password['password'];
        }
        $user->updated_by = Auth::id();

        if ($request->hasfile('img')) {
            User::imgValidator($request->all())->validate();
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $filename = time() . $name;
            $file->move('storage/users/', $filename);
            $user->img = $filename;
        }

        $user->save();

        return redirect()->route('users.index')->with('alert_sucesss', 'User was updated successfully');
    }

    /**
     * Show the confirmation resource for delete.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = User::find($id);
        if ($user == null) {
            abort(404);
        }
        return view('dashboard.users.deleteUser')->with('user', $user);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->deleted_by = Auth::id();
        $user->save();
        $user->delete();

        return redirect()->route('users.index')->with('alert_danger', 'User was deleted successfully');
    }

    /*
     * Activate and Deactivate status for user
     */
    public function activation($id)
    {
        $user = User::find($id);
        if ($user->status == 0) {
            $user->status = 1;  // deactivate
        } elseif ($user->status == 1) {
            $user->status = 0;  // activate
        }
        $user->save();
        return back();
    }

}
