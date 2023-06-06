<div class="lg:grid h-full lg:grid-cols-12 space-y-5 lg:space-y-0 gap-10">
    @forelse($products as $product)
        <div class="lg:col-span-4">
            @include('partials.product')
        </div>
    @empty
        <div class="lg:col-span-12 pt-10 lg:pt-0 h-full flex text-2xl font-bold items-center justify-center">
            {{ trans('global.no_products') }}
        </div>
    @endforelse
</div>
