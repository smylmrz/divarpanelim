@extends('master')

@section('title', $product->name)
@section('description', $product->description)

@section('content')
    <section class="px-5 lg:px-0 container py-10 lg:py-20 mx-auto">
        <div class="lg:grid grid-cols-12 mb-20 space-y-5 lg:space-y-0 gap-10">
            <div class="col-span-6">
                <product-slider :images="{{ $images }}"></product-slider>
            </div>
            <div class="col-span-6">
                <div class="space-y-2 mb-5">
                    <h1 class="text-2xl font-bold">{{ $product->sku }}</h1>
                    <div class="text-sm text-neutral-600">L {{ $product->length }} x H {{ $product->height }} x W {{ $product->width }} cm</div>
                </div>

                <div class="font-bold text-2xl mb-3">
                    ₼{{ $product->price }} / <span>m <sup>2</sup></span>
                </div>

                <p class="my-8 leading-loose">
                    {{ $product->description }}
                </p>

                <div class="my-8 leading-loose">
                    {{ trans('global.material') }}: <span class="font-bold">{{ $product->material->name }}</span>
                </div>

                <a href="{{ route('orders.create', $product->slug) }}" class="rounded-full inline-block group font-bold text-2xl px-8 py-4 duration-200 bg-neutral-800 text-white hover:bg-amber-400 hover:text-black">
                    {{ trans('global.order_now') }}
                </a>
            </div>
        </div>

        <div>
            @foreach($interiors as $image)
                <div>
                    <img src="{{ asset($image->image) }}" alt="{{ $product->name ?? $product->sku }}">
                </div>
            @endforeach
        </div>

        @if(count($products))
        <div class="mt-20">
            <h1 class="max-w-fit mx-auto pb-8 border-b-2 border-black text-center font-pfd font-black text-6xl">
                {{ trans('global.related_products') }}
            </h1>

            @include('partials.products', $products)
        </div>
        @endif
    </section>
@endsection
