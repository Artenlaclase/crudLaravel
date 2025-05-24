<x-layout>
    <div class="row m-4">

        {{-- POST PRINCIPAL DESTACADO --}}
        @if($mainPost)
            <div class="col-12 mb-4">
                <div class="card bg-light">
                    <div class="card-body">
                        <h2 class="card-title">{{ $mainPost->title }}</h2>
                        <p class="card-text">{{ Str::limit($mainPost->content, 200) }}</p>
                        <a href="{{ route('posts.show', $mainPost) }}" class="btn btn-primary">Leer más</a>
                    </div>
                </div>
            </div>
        @endif

        {{-- LISTA DE POSTS RESTANTES --}}
        <div class="col-12">
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
