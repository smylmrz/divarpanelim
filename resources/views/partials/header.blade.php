<header>
    <div class="border-b py-3">
        <div class="font-bold text-sm container mx-auto flex justify-between">
            <div class="flex">
                <div class="border-r flex gap-1 pr-2">

                    <svg class="w-4" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 0C4.486 0 0 4.486 0 10V14.143C0 15.167 0.897 16 2 16H3C3.26522 16 3.51957 15.8946 3.70711 15.7071C3.89464 15.5196 4 15.2652 4 15V9.857C4 9.59178 3.89464 9.33743 3.70711 9.14989C3.51957 8.96236 3.26522 8.857 3 8.857H2.092C2.648 4.987 5.978 2 10 2C14.022 2 17.352 4.987 17.908 8.857H17C16.7348 8.857 16.4804 8.96236 16.2929 9.14989C16.1054 9.33743 16 9.59178 16 9.857V16C16 17.103 15.103 18 14 18H12V17H8V20H14C16.206 20 18 18.206 18 16C19.103 16 20 15.167 20 14.143V10C20 4.486 15.514 0 10 0Z" fill="#FBBF24"/>
                    </svg>

                    <a class="text-neutral-900 hover:text-neutral-700" href="tel:+994 50 123 45 67">
                        +994 {{ $settings->phone }}
                    </a>
                </div>
                @include('partials.locale-switcher')
            </div>
            <div class="flex gap-1">
                <svg class="h-4" width="16" height="22" viewBox="0 0 16 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 0C3.58002 0 1.05266e-05 3.50892 1.05266e-05 7.83677C-0.0027941 9.52709 0.554902 11.1726 1.58917 12.5256L6.72062 21.2325C6.7504 21.2886 6.78019 21.3444 6.81678 21.3959L6.82813 21.415L6.83125 21.4134C6.96483 21.5957 7.14101 21.7441 7.34507 21.8461C7.54913 21.9482 7.77515 22.0009 8.00426 22C8.44566 22 8.83033 21.8032 9.095 21.5001L9.10833 21.5076L9.15911 21.4214C9.234 21.3225 9.30038 21.2169 9.34832 21.1005L14.3757 12.5698C15.4318 11.2091 16.0025 9.54617 16 7.83677C16 3.50892 12.42 0 8 0ZM7.92086 11.8098C5.74306 11.8098 3.97916 10.081 3.97916 7.94849C3.97916 5.81624 5.74306 4.0872 7.92086 4.0872C10.0986 4.0872 11.8626 5.81624 11.8626 7.94849C11.8626 10.0807 10.0986 11.8098 7.92086 11.8098Z" fill="#FBBF24"/>
                </svg>

                <a class="text-neutral-900 hover:text-neutral-700" target="_blank" href="https://www.google.com/maps/place/Bal+Studio/@40.3851581,49.8503296,17z/data=!3m1!4b1!4m6!3m5!1s0x40307de243dbd387:0xa8b949ff4af9c607!8m2!3d40.3851581!4d49.8503296!16s%2Fg%2F11nnmhldmk?entry=ttu">
                    {{ $settings->address }}
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-12 items-center py-5 mx-auto container">

        <div class="col-span-3">
            @include('partials.search-form')
        </div>

        <div class="col-span-6 text-center space-y-2">
            <a title="{{ $settings->title }}" class="block font-pfd text-6xl font-black" href="{{ route('home') }}">
                <img class="w-96 mx-auto" src="{{ asset($settings->logo) }}" alt="{{ $settings->title }}">
            </a>
            @if($settings->tagline)
            <p class="text-sm text-gray-500">
                {{ $settings->tagline }}
            </p>
            @endif
        </div>

        <div class="flex justify-end col-span-3">
            <ul class="font-bold flex gap-5">
                <li>
                    <a class="text-neutral-900 hover:text-neutral-600" title="About us" href="{{ route('about') }}">About us</a>
                </li>
                <li>
                    <a class="text-neutral-900 hover:text-neutral-600" title="Blog" href="{{ route('posts.index') }}">Blog</a>
                </li>
                <li>
                    <a class="text-neutral-900 hover:text-neutral-600" title="Contact" href="{{ route('contact') }}">Contact</a>
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
