@extends('master')
@section('title', 'About')

@section('content')
    <section class="py-20">
        <div class="container mx-auto">
            <h2 class="font-pfd font-bold text-center text-4xl mb-10">
                {{ trans('global.about') }}
            </h2>

            <p>
                {{ $settings->about }}
            </p>
        </div>
    </section>
@endsection
