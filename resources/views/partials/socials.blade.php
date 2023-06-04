<div class="space-y-5">
    <h4 class="text-lg font-bold">{{ trans('global.social') }}</h4>
    <ul class="font-medium flex justify-center lg:justify-start gap-2">

        @foreach($socials as $social)
            @if($social->url)
                <li>
                    <a target="_blank" href="{{ $social->url }}">
                        {!! $social->icon !!}
                    </a>
                </li>
            @endif
        @endforeach

    </ul>
</div>
