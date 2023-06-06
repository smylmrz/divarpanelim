@extends('master')

@section('title', trans('global.products'))

@section('content')
    <section class="container px-5 lg:px-0 mx-auto py-10 lg:py-20">
        @include('partials.products', $products)
    </section>
@endsection
