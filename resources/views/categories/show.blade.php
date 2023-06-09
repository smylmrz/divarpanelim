@extends('master')

@section('title', $category->name)
@section('description', $category->description)

@section('content')
    <section class="container mx-auto py-20">
        <h1 class="max-w-fit mx-auto pb-8 border-b-2 border-black text-center font-pfd font-black text-6xl">{{ $category->name }}</h1>

        <div class="grid grid-cols-12 gap-10">
            @forelse($category->products as $product)
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
            @empty
                <div class="col-span-12 text-2xl text-center py-10">No products in this category</div>
            @endforelse
        </div>
    </section>
@endsection
