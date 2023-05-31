@extends('master')
@section('title', 'Blog')

@section('content')
    @if(count($posts))
        <section class="py-20">
            <div class="container mx-auto">
                <h2 class="font-pfd font-bold text-center text-4xl mb-10">Bloq</h2>

                @include('partials.posts', ['posts' => $posts])
            </div>
        </section>
    @endif
@endsection
