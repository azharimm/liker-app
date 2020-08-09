<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Post;

class PostUserTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'owner',
        'liked'
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform(Post $post)
    {
        return [];
    }

    public function includeOwner(Post $post)
    {
        return $this->primitive($post, function() use ($post) {
            return optional(auth()->user())->id === $post->user_id;
        });
    }

    public function includeLiked(Post $post)
    {
        return $this->primitive($post, function() use ($post) {
            if(!$user = auth()->user()) {
                return false;
            }

            return $post->likers->contains($user);
        });
    }
}
