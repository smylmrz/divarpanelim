@extends('master')

@section('title', $product->name)
@section('description', $product->description)

@section('content')
    <section class="container py-20 mx-auto">
        <div class="grid grid-cols-12 gap-10">
            <div class="col-span-6">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
            </div>
            <div class="col-span-6">
                <div class="space-y-2">
                    <h1 class="text-2xl font-bold">{{ $product->sku }}</h1>
                    <div class="text-sm text-neutral-600">L {{ $product->length }} x H {{ $product->height }} x W {{ $product->width }} cm</div>
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
            @foreach($product->images as $image)
                <div>
                    <img src="{{ asset($image->image) }}" alt="{{ $product->name ?? $product->sku }}">
                </div>
            @endforeach
        </div>
    </section>
@endsection
