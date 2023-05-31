<footer class="bg-neutral-900 text-white">
    <div class="container mx-auto">
        <div class="grid grid-cols-12 py-10">
            <div class="col-span-3">
                <div class="space-y-2">
                    <a title="{{ $settings->title }}" class="block font-pfd text-6xl font-black" href="{{ route('home') }}">
                        <img class="w-60" src="{{ asset($settings->footer_logo) }}" alt="{{ $settings->title }}">
                    </a>
                    @if($settings->tagline)
                        <p class="text-sm text-gray-500">
                            {{ $settings->tagline }}
                        </p>
                    @endif
                </div>
            </div>
            <div class="col-span-2">
                <div class="space-y-5">
                    <h4 class="text-lg font-bold">Navigation</h4>
                    <ul class=" font-medium flex flex-col gap-2">
                        <li>
                            <a class="text-neutral-500 hover:text-neutral-300" title="About us" href="{{ route('about') }}">About us</a>
                        </li>
                        <li>
                            <a class="text-neutral-500 hover:text-neutral-300" title="Blog" href="{{ route('posts.index') }}">Blog</a>
                        </li>
                        <li>
                            <a class="text-neutral-500 hover:text-neutral-300" title="Contact" href="{{ route('contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-span-5">
                <div class="space-y-5">
                    <h4 class="text-lg font-bold">Categories</h4>
                    <ul class="font-medium flex flex-wrap gap-2">
                        @foreach($categories as $category)
                            <li>
                                <a class="text-neutral-500 hover:text-neutral-300" href="{{ route('categories.show', $category->slug) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-span-2">
                @include('partials.socials')
            </div>
        </div>

        <div class="text-sm text-neutral-500 text-center border-t border-t-neutral-800 py-5">
            &copy; {{ now()->year }} {{ $settings->copyright }}
        </div>
    </div>
</footer>
