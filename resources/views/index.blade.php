@extends('master')

@section('content')
    <Slider></Slider>

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
