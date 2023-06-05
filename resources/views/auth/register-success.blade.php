@extends('master')

@section('content')
    <section class="text-center py-10 lg:py-20 space-y-10 container mx-auto px-5 lg:px-0">
        <h1 class="max-w-fit mx-auto pb-8 font-pfd font-black text-6xl">
            {{ trans('global.registration_was_successful') }}
        </h1>
        <p class="text-2xl">
            {{ trans('global.we_will_contact_you') }}
        </p>
    </section>
@endsection
