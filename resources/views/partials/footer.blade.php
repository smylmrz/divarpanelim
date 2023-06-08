@php
    $links = [
        [
            "name" => trans("global.about"),
            "route" => "about",
            "path" => "/about"
        ],
        [
            "name" => trans("global.blog"),
            "route" => "posts.index",
            "path" => "/blog"
        ],
        [
            "name" => trans("global.for_designers"),
            "route" => "home",
            "path" => "/projects"
        ],
    ]
@endphp

<footer class="bg-neutral-900 text-white">
    <div class="container text-center lg:text-left mx-auto">
        <div class="lg:grid grid-cols-12 space-y-10 lg:space-y-0 px-5 lg:px-0 py-10">

            <div class="col-span-12 lg:col-span-3">
                <div class="space-y-2">
                    <a title="{{ $settings->title }}" class="block font-pfd text-6xl font-black" href="{{ route('home') }}">
                        <img class="w-60 mx-auto lg:mx-0" src="{{ asset($settings->footer_logo) }}" alt="{{ $settings->title }}">
                    </a>
                    @if($settings->tagline)
                        <p class="text-sm text-gray-500">
                            {{ $settings->tagline }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="col-span-12 lg:col-span-2">
                <div class="space-y-5">
                    <h4 class="text-lg font-bold">{{ trans('global.navigation') }}</h4>
                    <ul class=" font-medium flex flex-col gap-2">
                        @foreach($links as $link)
                            <li>
                                <a class="text-neutral-500 hover:text-neutral-300" title="{{ $link['name'] }}" href="{{ route($link['route']) }}">
                                    {{ $link['name'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-span-12 lg:col-span-5">
                <div class="space-y-5">
                    <h4 class="text-lg font-bold">{{ trans('global.categories') }}</h4>
                    <ul class="font-medium flex flex-col lg:flex-row flex-wrap gap-2">
                        @foreach($categories as $category)
                            <li>
                                <a class="text-neutral-500 hover:text-neutral-300" href="{{ route('products.index', ['category' => $category->slug]) }}">
                                    {{ $category->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-span-12 lg:col-span-2">
                @include('partials.socials')
            </div>

        </div>

        <div class="text-sm text-neutral-500 text-center border-t border-t-neutral-800 py-5">
            &copy; {{ now()->year }} {{ $settings->copyright }}
        </div>
    </div>
</footer>
