@extends('master')

@section('content')

    <div class="hero-image" style="background-image: url('{{ Voyager::image($page->cover) }}'); height: 750px;">
        <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">
    </div>


    @include('components.section', [$page])

    @include('components.articles', [$cards])

    @include('components.brands-slider', [$brands])

    @include('components.map')
    {{-- 
    @if ($page->slug == 'carrieres')
        @include('cms.careers.apply')
    @elseif ($page->slug == 'contact')
        @include('cms.contact.index')
    @else
      @include('frontend.cms.page')
    @endif
    --}}
@endsection
