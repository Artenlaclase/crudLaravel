<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\Post\CreatePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;
use App\Services\Post\PostService;
use App\Models\Post;


class PostController extends Controller
{

    public function __construct(protected PostService $service) {}
    public function index()
    {
        $mainPost = Post::latest()->first(); // o con is_featured si lo usas
        $posts = $this->service->getAll();

        return view('posts.index', compact('mainPost', 'posts'));
    }

    public function create()
    {
        return view('posts.form', ['post' => new Post()]);
    }

    public function store(CreatePostRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()->route('posts.index')->with('message', 'Post created successfully');
    }

    public function show(string $id)
    {
        $post = $this->service->find($id);

        return view('posts.show', compact('post'));
    }


    public function edit(int $id)
    {
        $post = $this->service->find($id);

        return view('posts.form', compact('post'));
    }

    public function update(UpdatePostRequest $request, int $id)
    {
        $this->service->update($id, $request->validated());

        return redirect()->route('posts.index')->with('message', 'Post Actualizado exitosamente! ');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('posts.index')->with('message', 'Post Eliminado exitosamente! ');
    }
}
