@extends('master')
@section('title', trans('global.blog'))

@section('content')
    @if(count($posts))
        <section class="container mx-auto px-5 lg:px-0 py-10 lg:py-20 space-y-10">
            <h1 class="max-w-fit mx-auto pb-8 border-b-2 border-black text-center font-pfd font-black text-6xl">
                {{ trans('global.blog') }}
            </h1>

            @include('partials.posts', ['posts' => $posts])
        </section>
    @endif
@endsection
