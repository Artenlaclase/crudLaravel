<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests\Post\CreatePostRequest;
use App\Services\Post\PostService;

class PostController extends Controller
{

    public function __construct(protected PostService $service)
    {
        
    }
    public function index()
    {
        $posts = $this->service->getAll();

        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        //
    }

    public function store(CreatePostRequest $request)
    {
        $this->service->create($request->validated());

        return redirect()->route('posts.index')->with('message', 'Post created successfully');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
