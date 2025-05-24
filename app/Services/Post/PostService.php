<?php
namespace App\Services\Post;

use App\Models\Post;

class PostService
{

    public function create(array $data): Post
    {
        // Logic to create a post
        return Post::create($data);

    }
}