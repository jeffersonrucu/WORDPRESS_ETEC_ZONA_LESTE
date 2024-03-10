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

                <li class="relative">
                    @if(count($link->children) <= 0)
                        <a
                            class="nav-bar-primary__link {{$current ? 'current' : ''}}"
                            href="{{ $link->url }}"
                            target="{{ $link->target ?? '' }}"
                            rel="noopener noreferrer"
                        >
                            {{ $link->label }}
                        </a>
                    @else
                        <div class="nav-bar-primary__box-submenu">
                            <button class="nav-bar-primary__link nav-bar-primary__link--submenu" data-js="remove-event">
                                <div class="flex items-center gap-3">
                                    {{ $link->label }}
                                    <svg width="8" height="8" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.69282 6.8C4.3849 7.33333 3.6151 7.33333 3.30718 6.8L0.362693 1.7C0.0547733 1.16667 0.439672 0.5 1.05551 0.5L6.94449 0.5C7.56033 0.5 7.94523 1.16667 7.63731 1.7L4.69282 6.8Z" fill="#8B8B8B"/>
                                    </svg>
                                </div>
                            </button>

                            <ul class="nav-bar-primary__submenu">
                                @foreach ($link->children as $child)
                                    @php
                                        global $wp;
                                        $currentUrl = home_url( $_SERVER['REQUEST_URI'] );
                                        $currentUrl = urldecode($currentUrl);
                                        $currentUrl = rtrim($currentUrl, '/');

                                        $child->url = rtrim($child->url, '/');

                                        $current = $currentUrl == $child->url ? true : false
                                    @endphp

                                    <li>
                                        <a
                                            class="nav-bar-primary__link {{$current ? 'current' : ''}}"
                                            href="{{ $child->url }}"
                                            target="{{ $child->target ?? '' }}"
                                            rel="noopener noreferrer"
                                        >
                                            {{ $child->label }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
@endif
