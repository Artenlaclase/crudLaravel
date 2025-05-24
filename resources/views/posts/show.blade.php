<x-layout>
    <div class="container my-4">
        <h1>{{ $post->title }}</h1>
        <p class="text-muted">{{ $post->created_at->format('d M Y') }}</p>

        <div class="mt-4">
            {!! nl2br(e($post->content)) !!}
        </div>

        <a href="{{ route('posts.index') }}" class="btn btn-secondary mt-4">← Volver</a>
    </div>
</x-layout>
