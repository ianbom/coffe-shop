<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

use App\Models\User;

class UserController extends Controller
{
    public function index_user(Request $request){
        $user = Auth::user();
        $user = User::all();

    $search = $request->input('search');
    $query = User::query();

    if ($search) {
        $query->where('name', 'like', '%' . $search . '%')->orWhere('id', $search);
    }

    $cari = $query->get();

        return view('user_admin',compact('user', 'cari'));
    }

    public function user_total()
    {

        $totalUser = User::getTotalUser();


        return view('dashboard_admin', compact('totalUser'));
    }
}
