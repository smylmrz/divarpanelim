@extends('master')

@section('title', trans('global.catalog'))

@section('content')
    <section class="space-y-10 container px-5 lg:px-0 mx-auto pb-10 lg:py-20">
        <form action="" class="w-full">
            <div class="lg:grid space-y-5 lg:space-y-0 grid-cols-12 gap-10">
                <div class="lg:col-span-3 text-center lg:text-left">
                    @isset($search)
                        {{ trans('global.search_results_for') }}: {{ $search }}
                        <input type="hidden" name="search" value="{{ $search }}">
                    @endisset
                </div>
                <div class="lg:col-span-9">
                    @include('partials.sort')
                </div>

                <div class="lg:col-span-3">
                    @include('partials.filters')
                </div>

                <div class="lg:col-span-9">
                    @if($parent_category)
                        <div class="pb-5 border-b border-neutral-100 grid grid-cols-12 space-x-5">
                            @foreach($parent_category->children as $child)
                                <a class="col-span-4 lg:col-span-2 block space-y-2" href="{{ route('products.index', ['category' => $child->slug]) }}">
                                    <div class="border">
                                        <img class="w-full" src="{{ asset($child->image) }}" alt="">
                                    </div>
                                    <h4 class="text-center text-sm text-neutral-600">{{ $child->name }}</h4>
                                </a>
                            @endforeach
                        </div>
                    @endif
                    @include('partials.products', $products)
                </div>
            </div>
        </form>
    </section>
@endsection
