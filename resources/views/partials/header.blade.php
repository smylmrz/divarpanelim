<header>
    <div class="border-b py-2">
        <div class="font-bold text-sm container mx-auto flex justify-between">
            <div class="flex">
                <div class="border-r pr-2">
                    +994 50 123 45 67
                </div>
                @include('partials.locale-switcher')
            </div>
            <div>
                lorem ipsum dolor sit amet
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 items-center py-5 mx-auto container">

        <div class="col-span-3">
            @include('partials.search-form')
        </div>

        <div class="col-span-6 text-center space-y-4">
            <a title="Divar Panelim" class="block  font-pfd text-6xl font-black" href="{{ route('home') }}">
                DivarPanelim.az
            </a>
            <p class="text-sm text-gray-500">Premium home decors that work</p>
        </div>

        <div class="flex justify-end col-span-3">
            <ul class="font-bold flex gap-5">
                <li>
                    <a href="">About us</a>
                </li>
                <li>
                    <a href="">Blog</a>
                </li>
                <li>
                    <a href="">Contact</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="absolute top-[173px] w-full z-10 group bg-neutral-900 hover:bg-amber-400 duration-200">
        <div class="container mx-auto">
            <ul class="flex justify-between duration-200 group-hover:text-black text-white text-sm font-bold">
                @foreach($categories as $category)
                    <li class="py-4 w-full hover:bg-amber-500 duration-200">
                        <a title="{{ $category->name }}" class="flex flex-col items-center" href="{{ route('categories.show', $category->slug) }}">
                            <span>
                                {{ $category->name }}
                            </span>
                            @if($category->image)
                                <div class="w-24 hidden group-hover:block">
                                    <img src="{{ $category->image }}" alt="{{ $category->name }}">
                                </div>
                            @endif
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

</header>
