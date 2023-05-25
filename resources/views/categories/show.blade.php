@extends('master')

@section('title', $category->name)
@section('description', $category->description)

@section('content')
    <section class="container mx-auto py-20">
        <h1 class="max-w-fit mx-auto pb-8 border-b-2 border-black text-center font-pfd font-black text-6xl">{{ $category->name }}</h1>
    </section>
@endsection
