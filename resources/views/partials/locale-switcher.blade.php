<div class="pl-2 group relative uppercase">
    <div>{{ app()->getLocale() }}</div>
    <ul class="z-10 duration translate-y-4 absolute top-full left-0 opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto group-hover:translate-y-0">
        @foreach($languages as $language)
            @if($language->slug != app()->getLocale())
            <li class="py-1">
                <a class="bg-white duration-200 flex px-2 py-1 hover:bg-amber-400" href="{{ route('locale', $language->slug) }}">
                    {{ $language->slug }}
                </a>
            </li>
            @endif
        @endforeach
    </ul>
</div>
