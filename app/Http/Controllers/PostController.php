<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index() {
        // $posts = Post::orderBy('created_at', 'desc')->with(['user', 'likes'])->paginate(10);
        $posts = Post::latest()->with(['user', 'likes'])->paginate(10);


        // \dd($posts);
        return view('posts.index', [
            'posts' => $posts
        ]);
    }

    public function show(Post $post) {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store(Request $request) {
        // \dd('ok');
        $this->validate($request, [
            'body' => 'required'
        ]);

        // method 1 to create post while laravel fill in the user id for us
        // $request->user()->posts()->create([
        //     'body' => $request->body
        // ]);

        // method 2
        $request->user()->posts()->create($request->only('body'));

        return back();

        // Post::create([
        //     // 'user_id' => auth()->user()->id,
        //     'user_id' => auth()->id,
        //     'body' => $request->body
        // ]);
    }

    public function destroy(Post $post) {
        // \dd($post);
        $this->authorize('delete', $post);
        // if (!$post->ownedBy(auth()->user())) {
        // # code...
        // }

        $post->delete();

        return back();
    }
}
