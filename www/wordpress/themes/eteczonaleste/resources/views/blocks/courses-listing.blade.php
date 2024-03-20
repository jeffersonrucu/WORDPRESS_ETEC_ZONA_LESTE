<section
  class="{{ $block->classes }} bg-white-light dark:bg-white-dark py-6"
  id="{{ $block->block->anchor ?? '' }}"
>
    <div class="container">
        <div class="courses-listing__wysiwyg">
            {!! $content['wysiwygContent'] !!}
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-x-8 gap-y-8 mt-16 max-w-[1036px] mx-auto">
            @php
                if($advance['allCourses']) {
                    $args = array(
                        'post_type' => 'cursos',
                        'posts_per_page' => -1,
                        'post_status' => 'publish',
                    );

                    $query = new WP_Query($args);
                    $content['repeaterPosts'] = [$query->posts];
                }
            @endphp

            @foreach($content['repeaterPosts'] as $posts)
                @foreach($posts as $post)
                    @if($post)
                        <div class="courses-listing__card col-span-1 relative">
                            <figure class="courses-listing__card__icon">
                                @if(isset($posts['icon']) && !empty($posts['icon']))
                                    <img
                                        src="{{ $posts['icon']['url'] }}"
                                        alt="{{ $posts['icon']['alt'] }}"
                                    >
                                @else
                                    <img
                                        src="@asset('images/icons/tag.svg')"
                                        alt="Icone de etiqueta marcando o curso"
                                    >
                                @endif
                            </figure>

                            @if($post->post_title)
                                <p class="courses-listing__card__title">{{ $post->post_title }}</p>
                            @endif

                            @if($post->post_excerpt)
                                <p class="courses-listing__card__exception">{{ App\formatText($post->post_excerpt, 80) }}</p>
                            @endif

                            <a
                                class="absolute top-0 left-0 w-full h-full"
                                href="{{ get_permalink($post->ID) }}"
                            >
                                <span class="sr-only">Acessar o curso {{ $post->post_title }}</span>
                            </a>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>

        <div class="flex justify-center mt-14">
            @notempty($content['button'])
                <x-button
                    :button="$content['button']"
                />
            @endnotempty
        </div>
    </div>
</section>
