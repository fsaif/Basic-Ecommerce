<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    // authentication code
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showMyProfile()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('myProfile')->with('user', $user);
    }

    public function editMyProfileForm()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('editMyProfile')->with('user', $user);
    }

    public function editMyProfile(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));

        if($request->hasfile('img'))
        {
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $filename =time().$name;
            $file->move('storage/users/', $filename);
            $user->img = $filename;
        }

        $user->save();

        return redirect(route('myprofile.route'));
    }

}
