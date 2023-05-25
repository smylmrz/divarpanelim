<header>
    <div class="border-b py-2">
        <div class="font-bold text-sm container mx-auto flex justify-between">
            <div>
                +994 50 123 45 67
            </div>
            <div>
                lorem ipsum dolor sit amet
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 py-5 mx-auto container">

        <div class="col-span-3">
            @include('partials.search-form')
        </div>

        <div class="col-span-6 text-center space-y-4">
            <a title="Divar Panelim" class="block  font-pfd text-6xl font-bold" href="{{ route('home') }}">
                DivarPanelim.az
            </a>
            <p class="text-sm text-gray-500">Premium home decors that work</p>
        </div>

        <div class="col-span-3">
            todo
        </div>
    </div>

    <div class="absolute top-[173px] w-full z-10 group bg-neutral-900 hover:bg-amber-400 duration-200">
        <div class="container mx-auto">
            <ul class="flex justify-between duration-200 group-hover:text-black text-white text-lg font-bold">
                @foreach($categories as $category)
                    <li class="py-4 w-full hover:bg-amber-500 duration-200">
                        <a class="flex flex-col items-center" href="">
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
