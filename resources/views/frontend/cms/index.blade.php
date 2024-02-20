@extends('master')

@section('content')
    <div class="hero-image" style="background-image: url('{{ Voyager::image($page->cover) }}'); height: 750px;">
        <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">
    </div>

    @if ($page->slug == 'qui_sommes_nous' || $page->slug == 'mot_du_president' || $page->slug == 'date_cle')
        @include('components.section', [$page])
    @else
        @include('components.section', [$page])

        @include('components.articles', [$cards])

        @include('components.brands-slider', [$brands])

        @include('components.map')
    @endif

    {{-- @if ($page->slug == 'carrieres')
        @include('cms.careers.apply')
    @elseif ($page->slug == 'contact')
        @include('cms.contact.index')
    @else
      @include('frontend.cms.page')
    @endif --}}
@endsection
