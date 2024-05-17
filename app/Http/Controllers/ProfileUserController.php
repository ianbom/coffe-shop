<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class ProfileUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show_profile_user()
    {
        $user = Auth::user();
        return view('views2.profile', compact('user'));
    }

    public function edit_profile_user(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required|min:8|confirmed'
        ]);

        $user = Auth::user();
        $user->update([
            'name' => $request->name,
            'password' => Hash::make($request->password)
        ]);

        return Redirect::back();
    }
}
