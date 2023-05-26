@extends('master')

@section('title', 'Order')

@section('content')

    <section class="container mx-auto py-10">
        <div class="grid grid-cols-12 gap-10">
            <div class="col-span-8">
                <form class="w-1/2" action="{{ route('orders.store', $product->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="space-y-5">
                        <label class="block space-y-2 w-full" for="name">
                            <span class="font-medium">Ad, Soyad</span>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="rounded-full border-2 focus:outline-none focus:border-amber-400 border-black w-full py-2 px-4"
                                value="{{ old('name') }}"
                            >
                        </label>
                        <label class="block space-y-2 w-full" for="phone">
                            <span class="font-medium">Əlaqə nömrəsi</span>
                            <input
                                type="text"
                                name="phone"
                                id="phone"
                                class="rounded-full border-2 focus:outline-none focus:border-amber-400 border-black w-full py-2 px-4"
                                value="{{ old('phone') }}"
                            >
                        </label>
                        <label class="block space-y-2 w-full" for="city">
                            <span class="font-medium">Şəhər</span>
                            <input
                                type="text"
                                name="city"
                                id="city"
                                class="rounded-full border-2 focus:outline-none focus:border-amber-400 border-black w-full py-2 px-4"
                                value="{{ old('city') }}"
                            >
                        </label>
                        <label class="block space-y-2 w-full" for="address">
                            <span class="font-medium">Ünvan</span>
                            <input
                                type="text"
                                name="address"
                                id="address"
                                class="rounded-full border-2 focus:outline-none focus:border-amber-400 border-black w-full py-2 px-4"
                                value="{{ old('address') }}"
                            >
                        </label>
                        <label class="block space-y-2 w-full" for="note">
                            <span class="font-medium">Qeyd</span>
                            <textarea
                                name="note"
                                rows="10"
                                id="note"
                                class="rounded-xl border-2 focus:outline-none focus:border-amber-400 border-black w-full py-2 px-4"
                            >{{ old('note') }}</textarea>
                        </label>
                        <button class="rounded-full inline-block group font-bold text-lg px-8 py-4 duration-200 bg-neutral-800 text-white hover:bg-amber-400 hover:text-black">
                            Sifariş et
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-span-4 bg-neutral-200 p-5">
                <div class="text-center">
                    <a class="flex justify-center" href="{{ route('products.show', [$product->category->slug, $product->slug]) }}">
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
                    </a>
                    <div class="space-y-2">
                        <h1 class="text-2xl font-bold">{{ $product->sku }}</h1>
                        <div class="text-sm text-neutral-600">L {{ $product->length }} x H {{ $product->height }} x W {{ $product->width }} cm</div>
                        <p class="text-sm leading-loose">{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
