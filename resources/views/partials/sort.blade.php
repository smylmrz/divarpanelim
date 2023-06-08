<div class="flex justify-center lg:justify-end">
    <div class="gap-2 flex items-center lg:gap-4">
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
