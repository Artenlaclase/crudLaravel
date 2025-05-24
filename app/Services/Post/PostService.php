<?php
namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class PostService
{

    public function getAll(): LengthAwarePaginator
    {
        $query = Post :: lastest();

        return $query->paginate(Post ::PAGINATE);
    }

    public function create(array $data): Post
    {
        // Logic to create a post
        return Post::create($data);

    }
}