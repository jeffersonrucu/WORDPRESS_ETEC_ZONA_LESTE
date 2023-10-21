@php
  use Log1x\Navi\Navi;

  $nav = false;
  $logo = get_field('logo', 'option');
  $header = get_field('header', 'option');

  if($header['select_nav']) {
    $navigation = (new Navi())->build($header['select_nav']);
  }

  if (!$navigation->isEmpty()) {
    $nav = $navigation->toArray();
  }

@endphp

<header class="bg-white dark:bg-white-dark pt-9" data-section="header">
    <x-accessibility-bar />

    <div class="container">
        <div class="flex justify-between items-center py-3">
            @if($logo)
                {{-- VERSION LIGHT --}}
                <figure class="relative dark:hidden w-[4.313rem] h-14">
                    <img
                        class="w-full h-full object-contain"
                        src="{{ $logo['light']['url'] }}"
                        alt="{{ $logo['light']['alt'] }}"
                    >

                    <a class="absolute left-0 top-0 w-full h-full" href="{{ home_url() }}">
                        <span class="sr-only">Voltar ao início</span>
                    </a>
                </figure>

                {{-- VERSION DARK --}}
                <figure class="relative hidden dark:block w-[4.313rem] h-14">
                    <img
                        class="w-full h-full object-contain"
                        src="{{ $logo['dark']['url'] }}"
                        alt="{{ $logo['dark']['alt'] }}"
                    >

                    <a class="absolute left-0 top-0 w-full h-full" href="{{ home_url() }}">
                        <span class="sr-only">Voltar ao início</span>
                    </a>
                </figure>
            @endif

            <x-nav-bar-primary classes='header__nav' :nav="$nav" dataJS="navigation-bar" />

            <x-button-hamburger classes='header__button-hamburger' dataJS="btn-hamburger"/>
        </div>
    </div>
</header>
