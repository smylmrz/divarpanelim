@extends('master')

@section('title', $category->name)
@section('description', $category->description)

@section('content')
    <section class="py-10 lg:py-20 space-y-10">

        <h1 class="max-w-fit mx-auto pb-4 lg:pb-8 border-b-2 border-black text-center font-pfd font-black text-2xl lg:text-6xl">{{ $category->name }}</h1>

        <form class="px-5 lg:px-0 bg-neutral-100 py-5">
            <div class="flex flex-col lg:flex-row space-y-10 lg:space-y-0 lg:items-center lg:justify-between container mx-auto">
                <div class="gap-2 flex flex-col lg:flex-row items-center lg:gap-4">
                    <div class="text-lg">
                        {{ trans('global.material') }}:
                    </div>
                    <ul class="flex gap-2">
                        @foreach($materials as $material)
                            <li>
                                <label class="cursor-pointer flex gap-1">
                                    <input
                                        @if(isset($filters) && in_array($material->slug, $filters)) checked @endif
                                    name="materials[]" value="{{ $material->slug }}" type="checkbox">
                                    <span class="capitalize">{{ $material->name }}</span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <button class="font-medium px-4 py-1 rounded-full bg-amber-400 hover:bg-amber-500">
                        {{ trans('global.apply_filters') }}
                    </button>
                    @if($filters)
                        <a href="{{ route('products.category', $category->slug) }}" class="font-medium px-4 py-1 rounded-full bg-neutral-900 text-white hover:bg-neutral-800">
                            {{ trans('global.reset') }}
                        </a>
                    @endif
                </div>
                <div class="gap-2 flex flex-col lg:flex-row items-center lg:gap-4">
                    <div class="text-lg">
                        {{ trans('global.sort') }}:
                    </div>
                    <select class="rounded-full px-4 py-2 block" name="sort">
                        <option @if(isset($sort) && $sort === 'default') selected @endif value="default">{{ trans('global.default') }}</option>
                        <option @if(isset($sort) && $sort === 'price_asc') selected @endif value="price_asc">{{ trans('global.price_asc') }}</option>
                        <option @if(isset($sort) && $sort === 'price_desc') selected @endif value="price_desc">{{ trans('global.price_desc') }}</option>
                        <option @if(isset($sort) && $sort === 'popularity') selected @endif value="popularity">{{ trans('global.popularity') }}</option>
                    </select>
                    <button class="font-medium px-4 py-1 rounded-full bg-amber-400 hover:bg-amber-500">
                        {{ trans('global.apply_sort') }}
                    </button>
                </div>
            </div>
        </form>

        <div class="px-5 lg:px-0 container mx-auto">
            @include('partials.products', $products)
        </div>

    </section>
@endsection
