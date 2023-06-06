@extends('master')

@section('content')

    <section class="py-10 lg:py-20 container mx-auto px-5 lg:px-0">
        <h1 class="max-w-fit mx-auto pb-4 lg:pb-8 border-b-2 border-black text-center font-pfd font-black text-2xl lg:text-6xl">
            {{ trans('global.login') }}
        </h1>

        <div class="mt-10 w-full lg:w-1/4 mx-auto">
            <form action="{{ route('login.attempt') }}" method="post">
                @csrf
                <div class="space-y-5">
                    <label class="block space-y-2 w-full" for="email">
                        <span class="font-medium">{{ trans('global.email') }}</span>
                        <input
                            type="email"
                            name="email"
                            id="email"
                            class="rounded-full border-2 focus:outline-none focus:border-amber-400 border-black w-full py-2 px-4"
                            value="{{ old('email') }}"
                        >
                    </label>
                    <label class="block space-y-2 w-full" for="password">
                        <span class="font-medium">{{ trans('global.password') }}</span>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            class="rounded-full border-2 focus:outline-none focus:border-amber-400 border-black w-full py-2 px-4"
                        >
                    </label>

                    <button class="rounded-full inline-block group font-bold text-lg px-8 py-4 duration-200 bg-neutral-800 text-white hover:bg-amber-400 hover:text-black">
                        {{ trans('global.login') }}
                    </button>

                    <div>
                        <a class="underline" href="{{ route('register') }}">
                            {{ trans('global.create_an_account') }}
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
