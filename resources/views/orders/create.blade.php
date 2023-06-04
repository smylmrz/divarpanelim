@extends('master')

@section('title', $product->name . ' - ' . trans('global.order_now'))
@section('description', $product->description)

@section('content')
    <section class="px-5 lg:px-0 container mx-auto py-10">
        <div class="flex flex-col lg:grid grid-cols-12 gap-10">
            <div class="lg:col-span-8 order-2 lg:order-1">
                <form class="w-full lg:w-1/2" action="{{ route('orders.store', $product->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="space-y-5">
                        <label class="block space-y-2 w-full" for="name">
                            <span class="font-medium">{{ trans('global.full_name') }}</span>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="rounded-full border-2 focus:outline-none focus:border-amber-400 border-black w-full py-2 px-4"
                                value="{{ old('name') }}"
                            >
                        </label>
                        <label class="block space-y-2 w-full" for="phone">
                            <span class="font-medium">{{ trans('global.phone') }}</span>
                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                class="rounded-full border-2 focus:outline-none focus:border-amber-400 border-black w-full py-2 px-4"
                                value="{{ old('phone') }}"
                            >
                        </label>
                        <label class="block space-y-2 w-full" for="city">
                            <span class="font-medium">{{ trans('global.city') }}</span>
                            <input
                                type="text"
                                name="city"
                                id="city"
                                class="rounded-full border-2 focus:outline-none focus:border-amber-400 border-black w-full py-2 px-4"
                                value="{{ old('city') }}"
                            >
                        </label>
                        <label class="block space-y-2 w-full" for="address">
                            <span class="font-medium">{{ trans('global.address') }}</span>
                            <input
                                type="text"
                                name="address"
                                id="address"
                                class="rounded-full border-2 focus:outline-none focus:border-amber-400 border-black w-full py-2 px-4"
                                value="{{ old('address') }}"
                            >
                        </label>
                        <label class="block space-y-2 w-full" for="note">
                            <span class="font-medium">{{ trans('global.note') }}</span>
                            <textarea
                                name="note"
                                rows="10"
                                id="note"
                                class="rounded-xl border-2 focus:outline-none focus:border-amber-400 border-black w-full py-2 px-4"
                            >{{ old('note') }}</textarea>
                        </label>
                        <button class="rounded-full inline-block group font-bold text-lg px-8 py-4 duration-200 bg-neutral-800 text-white hover:bg-amber-400 hover:text-black">
                            {{ trans('global.order_now') }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="lg:col-span-4 bg-neutral-200 p-5 order-1 lg:order-2">
                <div class="text-center">
                    <a class="flex justify-center" href="{{ route('products.show', [$product->category->slug, $product->slug]) }}">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    </a>
                    <div class="space-y-2">
                        <h1 class="text-2xl font-bold">{{ $product->sku }}</h1>
                        <div class="text-sm text-neutral-600">
                            {{ trans('global.L') }} {{ $product->length }}
                            x
                            {{ trans('global.H') }} {{ $product->height }}
                            x
                            {{ trans('global.W') }} {{ $product->width }} cm</div>
                        <p class="text-sm leading-loose">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
