<article class="content-search my-11">
    <div class="container">
        <div class="content-search__card relative py-11 px-6">
            <div>
                <h4 class="text-[32px] text-black-light dark:text-black-dark font-bold mb-8">
                    {!! $title !!}
                </h4>
            </div>

            <div class="content-search__summary">
                @php(the_excerpt())
            </div>

            <a class="absolute top-0 left-0 w-full h-full" href="{{ get_permalink() }}">
                <span class="sr-only">{!! $title !!}</span>
            </a>
        </div>
    </div>
</article>
