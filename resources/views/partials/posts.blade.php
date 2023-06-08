<div class="grid grid-cols-12 gap-5 lg:gap-10">
    @foreach($posts as $post)
        <div class="space-y-3 col-span-12 lg:col-span-6">
            <div>
                <a class="block w-full" href="{{ route('posts.show', $post->slug) }}">
                    <img class="w-full" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
                </a>
            </div>

            <div class="flex justify-between space-x-5">
                <div class="space-y-2">
                    <a class="block font-pfd font-black text-2xl" href="{{ route('posts.show', $post->slug) }}">
                        {{ $post->title }}
                    </a>
                    <p>{{ $post->subtitle }}</p>
                </div>

                <div class="min-w-fit text-sm text-neutral-400">{{ $post->created_at->diffForHumans() }}</div>
            </div>

        </div>
    @endforeach
</div>
