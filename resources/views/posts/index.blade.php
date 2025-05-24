<x-layout>
    <div class="row m-4">
        <div class="col-12">
            @if(session('message'))
                <div class="alert alert-secondary my-2"> 
                    {{ session('message') }}
                </div>
            @endif

            <a href="{{ route('posts.create') }}" class="btn btn-primary my-2">Crear nuevo post</a>
        </div>

        <div class="col-12 mt-4">
            <ul class="list-group">
                @foreach($posts as $post)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $post->title }}</strong> ({{ $post->status }})
                        </div>
                        <div class="d-flex gap-2">
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form method="POST" action="{{ route('posts.destroy', $post) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este post?')">Eliminar</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="mt-3">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</x-layout>
