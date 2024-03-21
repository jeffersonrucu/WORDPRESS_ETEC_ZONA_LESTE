@php
  global $wp_query;
@endphp

@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if(have_posts())
    <section class="bg-secondary-dark py-32 pr-8">
      <div class="container mt-11 mb-2">
        <div class="px-6">
          <h3 class="text-5xl text-black-dark font-bold mb-2">Resultados da busca por: {{ $_GET['s'] }}</h3>
          <h3 class="text-base text-black-dark">Foram encontrados {{ $wp_query->post_count }} resultados.</h3>
        </div>
      </div>
    </section>

    @while(have_posts()) @php(the_post())
      <div class="mt-24">
        @include('partials.content-search')
      </div>
    @endwhile

    <div class="container mt-6 mb-12">
      <div class="flex justify-center gap-5">
        {!!
          paginate_links([
            'prev_text'          => __( 'Voltar' ),
            'next_text'          => __( 'Próximo' ),
          ])
        !!}
      </div>
    </div>

    @php(wp_reset_postdata())

  @else
    <section class="bg-secondary-dark py-32 pr-8">
      <div class="container mt-11 mb-2">
        <div class="px-6">
          <h3 class="text-5xl text-black-dark font-bold mb-2 text-center">Nenhum resultado encontrado no site</h3>
        </div>
      </div>
    </section>

    <section class="content-search">
      <div class="container">
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
          <dotlottie-player class="h-96 w-full" src="https://lottie.host/7d803482-22c9-48ed-aaa7-3007c227dd20/vzYY0J7xlo.json" background="transparent" speed="1" loop autoplay></dotlottie-player>
      </div>
    </section>

  @endif

  <x-loading-spinner data-js="loading-spinner-main"/>
@endsection
