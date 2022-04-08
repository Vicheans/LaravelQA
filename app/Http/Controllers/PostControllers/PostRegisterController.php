<?php

namespace App\Http\Controllers\PostControllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class PostRegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest');
    }   

    //
    public function index(){
        return view('posts.register');
    }

    public function CreateUser(Request $request){
        // dd($request->all());
        // dd($request->_token);
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->first_name." ".$request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // auth()->login($user);
        // auth()->loginUsingId(User::where('email', $request->email)->first()->id);
        auth()->attempt([
         'email' => $request->email,
         'password' => $request->password
        ]);

        return redirect(RouteServiceProvider::DASHBOARD);
        // return redirect('/posts/dashboard');
    }

}
