@foreach($posts as $post)
    @if($post)
        <div class="courses-listing__card col-span-1 relative" data-template="card">
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
