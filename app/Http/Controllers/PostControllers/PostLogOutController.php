<?php

namespace App\Http\Controllers\PostControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostLogOutController extends Controller
{
    //
    public function store(){
        auth()->logout();
        return redirect()->route('PostLogin');
    }
}
