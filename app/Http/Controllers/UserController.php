<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function all_users()
    {
        $users = User::paginate(20);
        return view('user.index',compact('users'));
    }


    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|min:3|regex:/^[a-zA-Z]+$/u|max:255',
            'last_name' => 'required|string|min:3|regex:/^[a-zA-Z]+$/u|max:255',
            'age' => 'required|integer|min:18|max:100',
            'phone' => 'required|regex:/^[0-9]{9}$/u',
            'sex' => 'required|integer',
            'email' => 'required|email|string|min:3|unique:users',
            'role' => 'required|string',
        ]);
        User::create([
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
            'age'=>$request->input('age'),
            'phone'=>$request->input('phone'),
            'sex'=>$request->input('sex'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password')),
            'role'=>$request->input('role'),
        ]);
        return redirect(route('users.index'))->with('status','User Registered Successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect(route('users.index'))->with('status','User Deleted successfully');
    }
}
