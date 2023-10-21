
@switch($type)
    @case('button')
        <button
            class="btn btn--primary btn--md uppercase"
        >
            {{ $button['title'] }}
        </button>
    @break

    @case('link')
        <a
            class="btn btn--{{ $style }} btn--{{ $size }} {{ $classes }} uppercase"
            href="{{ $button['url'] }}"
            target="{{ $button['target'] }}"
            rel="noopener noreferrer"
        >
            {{ $button['title'] }}
        </a>
    @break
@endswitch
