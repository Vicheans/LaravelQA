<?php

namespace App\Http\Controllers\PostControllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostLoginController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index(){
        return view('posts.login');
    }

    public function LoginUser(Request $request){

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(!auth()->attempt($request->only('email','password'), $request->remember)){
            return back()->with('status', 'Invalid credentials');
        }

        return redirect()->route('PostDashboard');
    }
}
