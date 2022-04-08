<?php

namespace App\Http\Controllers\PostsController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class CreateController extends Controller
{
    //
    public function index(){

        $posts = Post::get(); //collection

        return view('posts.index', [
            'posts' => $posts
        ]);
    }


    public function create(Request $request){
        
        $this->validate($request, [
            'title' => 'required|string|max:255|unique:posts',
            'body' => 'required|string|max:255',
        ]);
        
        // dd($request->all());

        // returns all posts attached to a user
        // dd(auth()->user()->posts);

        // Post::create([
        //     'title' => $request->title,
        //     'body' => $request->body,
        //     'user_id' => auth()->user()->id,
        // ]);     

        // OR

        $request->user()->posts()->create([
            'title' => $request->title,
            'body' => $request->body,
        ]);

        return back();
        // return view('posts.create');
    }
}
