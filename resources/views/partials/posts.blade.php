<div class="grid grid-cols-12 gap-10">
    @foreach($posts as $post)
        <div class="space-y-3 col-span-6">
            <div>
                <a href="{{ route('posts.show', $post->slug) }}">
                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                </a>
            </div>
            <a class="block font-pfd font-bold text-2xl" href="{{ route('posts.show', $post->slug) }}">
                {{ $post->title }}
            </a>
            <p>{{ $post->subtitle }}</p>
        </div>
    @endforeach
</div>
