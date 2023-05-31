@extends('master')

@section('title', $post->title)

@section('content')
    <section class="py-20">
        <div class="space-y-5 container mx-auto">
            <div>
                <img class="w-full" src="{{ asset($post->image) }}" alt="{{ $post->title }}">
            </div>

            <h1 class="font-pfd text-4xl font-bold">{{ $post->title }}</h1>

            <h6 class="text-xl">{{ $post->subtitle }}</h6>

            <div>
                {!! $post->body !!}
            </div>
        </div>
    </section>
@endsection
