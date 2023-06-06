<a class="block w-full" title="{{ $product->name ?? $product->sku }}" href="{{ route('products.show', $product->slug) }}">
    <div>
        <img class="w-full" src="{{ asset($product->image) }}" alt="{{ $product->name }}">
    </div>

    <div class="flex justify-between">
        <div class="space-y-1">
            <h4 class="font-bold">{{ $product->sku }}</h4>
            <div class="text-sm text-neutral-600">
                {{ trans('global.L') }} {{ $product->length }}
                x
                {{ trans('global.H') }} {{ $product->height }}
                x
                {{ trans('global.W') }} {{ $product->width }} {{ trans('global.sm') }}
            </div>
        </div>
        <div class="flex items-center px-5 bg-black rounded-full text-white font-bold">
            <span>
                ₼{{ $product->price }} / <span>m <sup>2</sup></span>
            </span>
        </div>
    </div>
</a>
