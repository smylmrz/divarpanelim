@extends('master')

@section('content')
    <Slider></Slider>

    <section
        class="info-bar mt-10 lg:mt-0 bg-no-repeat bg-cover bg-neutral-900/10 px-5 lg:px-0 py-10"
        style="
        background-image: url({{ asset($settings->info_bg) }})"
    >
        <div class="relative z-10 container text-center space-y-10 mx-auto">
            <h2 class="text-2xl lg:text-5xl text-white font-black font-pfd">
                {{ trans('global.why_us') }}
            </h2>

            <p class="lg:w-2/3 mx-auto lg:text-2xl leading-loose text-neutral-400 font-medium">
                {{ $settings->description }}
            </p>

            <a href="{{ route('about') }}" class="rounded-full inline-block group font-bold text-lg px-8 py-4 duration-200 bg-amber-300 hover:bg-amber-400">
                {{ trans('global.more_about_us') }}
            </a>
        </div>
    </section>

    <section class="px-5 lg:px-0 py-10 lg:py-20">
        <div class="container mx-auto space-y-20">
            @foreach($featured_categories as $fc)
                @if(count($fc->products))
                    <div>
                        <h2 class="font-pfd font-bold text-center text-4xl mb-10">
                            <a href="{{ route('products.index', ['category' => $fc->slug]) }}">
                                {{ $fc->name }}
                            </a>
                        </h2>

                        <div class="grid grid-cols-12 gap-y-5 lg:gap-y-0 lg:gap-x-10">
                            @foreach($fc->products as $product)
                                <div class="col-span-12 lg:col-span-3">
                                    @include('partials.product')
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </section>

    @if(count($posts))
        <section class="px-5 lg:px-0 py-10 lg:py-20">
            <div class="container mx-auto">
                <h2 class="font-pfd font-bold text-center text-4xl mb-10">
                    {{ trans('global.blog') }}
                </h2>

                @include('partials.posts', ['posts' => $posts])
            </div>
        </section>
    @endif

@endsection
