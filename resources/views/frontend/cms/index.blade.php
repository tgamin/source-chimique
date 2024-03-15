@extends('master')

{{-- @include('partials.page-title', [
    $breadcrumbs,
    'data_banner' => [
        'image' => asset('storage/pages/default.jpg'),
        'title' => '',
        'subtitle' => '',
        'images' => $page_images,
    ],
]) --}}



@section('content')
    {{-- carousel foreach page  --}}
    @php
        $breadcrumbs = collect();
        $page_gallery = $page->gallery;
    @endphp


    @if (!empty($page_gallery))
        {{-- ghan3ayt 3la component carousel dyali o ghansift liha had data --}}
        @include('components.carousel', [
            $breadcrumbs,
            $page,
            'data_banner' => [
                'image' => !empty($page->cover)
                    ? Voyager::image($page->cover)
                    : asset('storage/pages/default.jpg'),
                'title' => '',
                'subtitle' => '',
                'nbr_key' => $page->key_number,
                'video' => $page->video,
                'images' => $page_gallery,
            ],
        ])
        {{-- end of the carousel --}}
    @else
        <div class="hero-image" style="background-image: url('{{ Voyager::image($page->cover) }}')">
            <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">
        </div>
    @endif


    @if ($page->slug == 'qui_sommes_nous' || $page->slug == 'mot_du_president' || $page->slug == 'date_cle')
        @include('components.section', [$page])
    @else
        {{-- @include('components.carousel', [$heros]) --}}

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
