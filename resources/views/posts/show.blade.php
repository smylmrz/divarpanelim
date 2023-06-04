@extends('master')

@section('title', $post->title)

@section('content')
    <section class="px-5 lg:px-40 py-10 lg:py-20 space-y-5 container mx-auto">
        <div>
            <img class="w-full" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
        </div>

        <h1 class="font-pfd text-4xl font-bold">{{ $post->title }}</h1>

        <h6 class="text-xl">{{ $post->subtitle }}</h6>

        <div>
            {!! $post->body !!}
        </div>
    </section>
@endsection
