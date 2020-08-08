<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\PostTransformer;
use App\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();

        return fractal()
            ->collection($posts)
            ->transformWith(new PostTransformer)
            ->toArray();

    }
}
