@extends('master')

@section('title', $product->name)
@section('description', $product->description)

@section('content')
    <section class="container py-20 mx-auto">
        <div class="grid grid-cols-12 mb-20 gap-10">
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

                <a href="{{ route('orders.create', $product->slug) }}" class="rounded-full inline-block group font-bold text-2xl px-8 py-4 duration-200 bg-neutral-800 text-white hover:bg-amber-400 hover:text-black">
                    Order now
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
                Related products
            </h1>

            <div class="grid grid-cols-12 gap-10">
                @foreach($products as $product)
                    <div class="col-span-3">
                        <a title="{{ $product->name ?? $product->sku }}" href="{{ route('products.show', [$product->category->slug, $product->slug]) }}">
                            <div>
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="flex justify-between">
                                <div class="space-y-1">
                                    <h4 class="font-bold">{{ $product->sku }}</h4>
                                    <div class="text-sm text-neutral-600">L {{ $product->length }} x H {{ $product->height }} x W {{ $product->width }} cm</div>
                                </div>
                                <div class="flex items-center px-5 bg-black rounded-full text-white font-bold">
                            <span>
                                ₼{{ $product->price }} / <span>m <sup>2</sup></span>
                            </span>
                                </div>
                            </div>
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
        @endif
    </section>
@endsection
