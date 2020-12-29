<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\PostLiked;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function __construct() {

    $this->middleware(['auth']);

    }

    public function index() {
        // \dd(\auth()->user());
        // dd(auth()->user()->posts());
        // dd(auth()->user()->posts);
        // \dd(Post::find(19)->created_at);
        // $user = auth()->user();

        return \view('dashboard');
    }
}
