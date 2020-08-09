<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\PostTransformer;
use App\Post;
use App\Events\PostCreated;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return fractal()
            ->collection($posts)
            ->transformWith(new PostTransformer)
            ->toArray();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'body' => 'required'
        ]);
        
        $post = $request->user()->posts()->create($request->only('body'));

        event(new PostCreated($post));

        return fractal()
            ->item($post)
            ->transformWith(new PostTransformer)
            ->toArray();
    }
}
