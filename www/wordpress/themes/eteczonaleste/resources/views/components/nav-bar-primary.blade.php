@if($nav)
    <nav
        class="nav-bar-primary z-30 {{ $classes ?? '' }}"
        data-js="{{ $dataJS ?? '' }}"
    >
        <ul class="flex justify-end items-center gap-9">
            @foreach ($nav as $link)
                @php
                    global $wp;
                    $currentUrl = home_url( $_SERVER['REQUEST_URI'] );
                    $currentUrl = urldecode($currentUrl);
                    $currentUrl = rtrim($currentUrl, '/');

                    $link->url = rtrim($link->url, '/');

                    $current = $currentUrl == $link->url ? true : false
                @endphp

                <li>
                    <a
                        class="nav-bar-primary__link {{$current ? 'current' : ''}}"
                        href="{{ $link->url }}"
                        target="{{ $link->target ?? '' }}"
                        rel="noopener noreferrer"
                    >
                        {{ $link->label }}
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>
@endif
