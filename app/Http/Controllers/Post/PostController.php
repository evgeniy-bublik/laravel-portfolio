<?php

namespace App\Http\Controllers\Post;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post\Post;

class PostController extends Controller
{
    public function index(Request $request)
    {
        return view('post.index', [
            'posts' => Post::all(),
        ]);
    }
}
