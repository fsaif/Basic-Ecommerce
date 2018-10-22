<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        User::validator($request->all())->validate();
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        if ($request->input('password') != $user->password) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->hasfile('img')) {
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
        $user->delete();

        return redirect()->route('users.index')->with('alert_danger', 'User was deleted successfully');
    }
}
