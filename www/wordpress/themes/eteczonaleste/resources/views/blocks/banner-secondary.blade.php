<section
  class="{{ $block->classes }} bg-white-light dark:bg-white-dark py-24"
  id="{{ $block->block->anchor ?? '' }}"
>
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-20">
            <figure class="overflow-hidden rounded-xl max-w-[467px] mx-auto {{ !$advance['imageSide'] ? 'lg:order-1' : '' }}">
                <img
                    class="w-full h-full object-cover"
                    src="{{ $content['image']['url'] }}"
                    alt="{{ $content['image']['alt'] }}"
                >
            </figure>

            <div class="flex flex-col justify-center">
                <div class="banner-secondary__wysiwyg">
                    {!! $content['wysiwygContent'] !!}
                </div>

                <div>
                    <x-button
                        :button="$content['button']"
                    />
                </div>
            </div>
        </div>
    </div>
</section>