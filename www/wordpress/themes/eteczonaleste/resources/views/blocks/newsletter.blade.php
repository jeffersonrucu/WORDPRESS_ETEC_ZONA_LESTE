<section
  class="{{ $block->classes }} newsletter bg-white-light dark:bg-white-dark py-6"
  id="{{ $block->block->anchor ?? '' }}"
>
    <div class="container">
        @notempty($content['wysiwygContent'])
            <div class="newsletter__wysiwyg">
                {!! $content['wysiwygContent'] !!}
            </div>
        @endnotempty

        @php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 9,
                'post_status' => 'publish',
            );

            $query = new WP_Query($args);
            $posts = $query->posts;
        @endphp

        <div class="swiper !pb-16">
            <div class="swiper-wrapper">
                @foreach ($posts as $post)
                    <div class="swiper-slide">
                        <div class="newsletter__card px-8 py-9 bg-secondary-light dark:bg-secondary-dark text-white-dark dark:text-white-light rounded-3xl h-[453px] flex flex-col gap-5 max-w-[328px] mx-auto relative">
                            <figure class="w-full min-h-[200px] h-[200px] rounded-lg overflow-hidden">
                                <img loading="lazy" class="w-full h-full object-cover" src="{{ get_the_post_thumbnail_url($post->ID, 'full'); }}" alt="{{ $post->post_title }}">
                                <div class="swiper-lazy-preloader swiper-lazy-preloader-white"></div>
                            </figure>

                            <h6 class="font-bold after:content-[''] after:block after:w-12 after:h-[2px] after:mt-5 after:bg-primary-light">Lifetime access</h6>

                            <p class="mt-1">{{ str_replace('&hellip;', '...', wp_trim_words($post->post_excerpt, 7)) ?: str_replace('&hellip;', '...', wp_trim_words($post->post_content, 7)) }}</p>

                            <a class="absolute top-0 left-0 w-full h-full" href="{{ get_permalink($post->ID) }}">
                                <span class="sr-only">Acessar a notícia {{ $post->post_title }}</span>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
