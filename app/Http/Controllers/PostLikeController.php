<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transformers\PostTransformer;
use App\Post;

class PostLikeController extends Controller
{
    public function store(Post $post, Request $request)
    {
        $this->authorize('like', $post);

        if($post->maxLikesReachedFor($request->user())) {
            return response(null, 429);
        }
        
        $post->likes()->create([
            'user_id' => $request->user()->id
        ]);

        return fractal()
            ->item($post->fresh())
            ->transformWith(new PostTransformer)
            ->toArray();
    }
}