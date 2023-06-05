@extends('master')

@section('title', trans('global.products'))

@section('content')
    <section class="container mx-auto py-20">

        @include('partials.designs', $products)
    </section>
@endsection
