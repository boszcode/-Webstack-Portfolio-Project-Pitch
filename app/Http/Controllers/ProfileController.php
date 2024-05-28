<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //

    public function show()
    {
        return view('profile.show');
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit',compact('user'));
    }
}
