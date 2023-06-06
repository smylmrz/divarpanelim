<div class="space-y-5 p-5 rounded-lg bg-neutral-50">
    <div class="divide-y-2 space-y-5 divide-neutral-100">
        <accordion title="{{ trans('global.categories') }}">
            <ul class="space-y-1">
                @foreach($categories as $category)
                    <li>
                        <label class="cursor-pointer flex gap-2">
                            <input
                                type="checkbox"
                                name="category[]"
                                value="{{ $category->slug }}"
                                @if(isset($filter_categories) && in_array($category->slug, $filter_categories))
                                    checked
                                @endif
                            >
                            <span class="font-medium">{{ $category->name }}</span>
                        </label>
                    </li>
                @endforeach
            </ul>
        </accordion>

        <accordion class="pt-5" title="{{ trans('global.material') }}">
            <ul class="space-y-1">
                @foreach($materials as $material)
                    <li>
                        <label class="cursor-pointer flex gap-2">
                            <input
                                type="checkbox"
                                name="material[]"
                                value="{{ $material->slug }}"
                                @if(isset($filter_materials) && in_array($material->slug, $filter_materials))
                                    checked
                                @endif
                            >
                            <span class="font-medium">{{ $material->name }}</span>
                        </label>
                    </li>
                @endforeach
            </ul>
        </accordion>
    </div>

    <div class="pt-5 text-center gap-2 flex">
        <button class="font-medium px-4 py-2 rounded-full bg-amber-400 hover:bg-amber-500">
            {{ trans('global.apply_filters') }}
        </button>

        @if($filter_categories || $filter_materials)
            <a href="{{ route('products.index') }}" class="font-medium px-4 py-2 rounded-full bg-neutral-900 text-white hover:bg-neutral-800">
                {{ trans('global.reset') }}
            </a>
        @endif
    </div>
</div>
