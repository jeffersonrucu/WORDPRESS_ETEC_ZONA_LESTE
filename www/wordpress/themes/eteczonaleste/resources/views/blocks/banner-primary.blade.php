<section
    class="{{ $block->classes }} {{ $advance['imageRight'] ? 'image-right' : '' }} banner-primary bg-gradient-custom relative mx-auto max-w-[1920px] bg-white-light dark:bg-white-dark"
    id="{{ $block->block->anchor ?? '' }}"
>
    <figure class="absolute left-0 right-0 top-0 w-full h-full after:content-[''] after:h-full after:w-full after:absolute after:left-0 after:top-0 after:bg-[#1414149c]">
        <img
            class="w-full h-full object-cover"
            src="{{ $content['image']['url'] }}"
            alt="{{ $content['image']['alt'] }}"
        >
    </figure>

    <div class="container z-10 relative">
        <div class="flex flex-col justify-center h-[80vh] max-h-[528px] bg-gradient-custom">
            <div class="banner-primary__wysiwyg max-w-[737px] mb-28 md:mb-11">
                <p class="category mb-6"> {{ $content['category'] }} </p>
                {!! $content['wysiwygContent'] !!}
            </div>

            @notempty($content['button'])
                <div>
                    <x-button
                        :button="$content['button']"
                    />
                </div>
            @endnotempty
        </div>
    </div>
</section>
