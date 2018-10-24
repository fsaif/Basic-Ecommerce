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
        $user->updated_by = $id;

        if ($request->hasfile('img')) {
            User::imgValidator($request->all())->validate();
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $filename = time() . $name;
            $file->move('storage/users/', $filename);
            $user->img = $filename;
        }

        $user->save();

        return redirect()->route('myprofile.route')->with('alert_success', 'Profile was updated successfully');
    }

}
