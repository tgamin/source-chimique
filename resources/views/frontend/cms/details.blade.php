
@php
    $output = !empty($page->seo_description) ? $page->seo_description : $page->capture_block;
@endphp

@extends('layouts.frontend' , [
    'seo_image' => !empty($page->cover) ? Voyager::image($page->cover) : asset('images/pages/default.jpg')
])

@section('page.seo')
<title> {{!empty($page->seo_title) ? $page->seo_title : $page->getTranslatedAttribute('title', app()->getLocale(), 'fr')}} </title>

<meta name="keywords" content="{{$page->seo_keywords}}">
<meta name="description" content="{!! strip_tags($output) !!}">
<meta name="author" content="{{config('app.name')}} Staff">
<meta property="og:url" content="{{url()->current()}}">
<meta property="og:site_name" content="{{config('app.name')}}}}">
<meta property="og:title" content="{{ !empty($page->seo_title) ? $page->seo_title : $page->getTranslatedAttribute('title', app()->getLocale(), 'fr') }}">
<meta property="og:description" content="{!! strip_tags($output) !!}">
<meta property="og:image" content="{{!empty($page->cover) ? Voyager::image($page->cover) : Vite::asset('resources/images/tax-slide.jpg')}}">
@endsection


@section('content')

{{-- @auth
<a class="btn btn-dark rounded-0 d-flex" href="{{route('voyager.pages.edit', $page->id)}}" style="position:fixed;left:0;bottom:0;z-index:1000;" target="_blank">
    Edit
    <svg class="ms-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 32 32"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M22 3h7v7m-1.5-5.5L20 12m-3-7H8a3 3 0 0 0-3 3v16a3 3 0 0 0 3 3h16a3 3 0 0 0 3-3v-9"/></svg>
</a>
@endauth --}}

@php
    $breadcrumbs = collect();
    $breadcrumbs->add([ 'name' => $page->getTranslatedAttribute('title', app()->getLocale(), 'fr') ]);

@endphp

@include('partials.page-title', [
    $breadcrumbs,
    'data_banner' => [
        'image' => !empty($page->cover) ? Voyager::image($page->cover) : Vite::asset('resources/images/tax-slide.jpg'),
        'title' => $page->getTranslatedAttribute('title_block', app()->getLocale(), 'fr'),
        'subtitle' => '',
    ]
])

@php
    $sections = $page->sections()->active()->orderBy('order')->get();
@endphp
@foreach ($sections as $section)
<section class="sp-1 cms-block">
    <div class="container">
        {{-- @if(!empty($section->title))
        <div class="row">
            <div class="col-md-11 mx-auto sp-1 pt-0">
                <h2 class="sec-title text-center"> {{ $section->getTranslatedAttribute('title', app()->getLocale(), 'fr') }} </h2>
            </div>
        </div>
        @endif --}}

        <div class="row g-md-5">
            @if ($loop->first)
                <h3 class="d-md-none d-block sec-subtitle">
                    <a href="{{ route('home') }}"> Accueil </a> > {{ $page->getTranslatedAttribute('title', app()->getLocale(), 'fr') }}
                </h3>
            @endif

            @if($section->type == 'img-left')
            <div class="col-md-6">
                <div class="w-100 sticky-top-header">
                    <div class="box_parent">
                        <div class="box2">
                            <img class="img-fluid w-100 lazyload"
                                data-src="{{Voyager::image($section->image)}}"
                                alt="{{ $section->getTranslatedAttribute('title', app()->getLocale(), 'fr') }}"
                                title="{{ $section->getTranslatedAttribute('title', app()->getLocale(), 'fr') }}" >

                            <svg class="flt_svg" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <filter id="img_skew_mask">
                                        <feGaussianBlur in="SourceGraphic" stdDeviation="8" result="blur" />
                                        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="img_skew_mask" />
                                        <feComposite in="SourceGraphic" in2="img_skew_mask" operator="atop"/>
                                    </filter>
                                </defs>
                            </svg>
                        </div>
                    </div>
                </div>
                {{-- <div class="w-100 sticky-top">
                    <img class="img-fluid w-100"
                        src="{{Voyager::image($section->image)}}"
                        alt="{{ $section->getTranslatedAttribute('title', app()->getLocale(), 'fr') }}"
                        title="{{ $section->getTranslatedAttribute('title', app()->getLocale(), 'fr') }}"
                        >
                </div> --}}
            </div>
            @endif
            <div class="col-md-6 @if($section->type == 'img-right') order-md-1 order-2 @endif">
                @if ($loop->first)
                <h3 class="d-md-block d-none sec-subtitle">
                    <a href="{{ route('home') }}"> Accueil </a> > {{ $page->getTranslatedAttribute('title', app()->getLocale(), 'fr') }}
                </h3>
                @endif

                <h2 class="sec-title">
                    {{ $section->getTranslatedAttribute('title', app()->getLocale(), 'fr') }}
                </h2>
                <div class="cms-content mt-md-5">
                    @php
                        $output = filterStyleAttributes($section->getTranslatedAttribute('content', app()->getLocale(), 'fr'));
                    @endphp
                    {!! $output !!}
                </div>
            </div>
            @if($section->type == 'img-right')
            <div class="col-md-6 order-md-2 order-1 mb-md-0 mb-4">
                <div class="w-100 sticky-top-header">
                    <div class="box_parent">
                        <div class="box2">
                            <img class="img-fluid w-100 lazyload"
                                data-src="{{Voyager::image($section->image)}}"
                                alt="{{ $section->getTranslatedAttribute('title', app()->getLocale(), 'fr') }}"
                                title="{{ $section->getTranslatedAttribute('title', app()->getLocale(), 'fr') }}" >

                            <svg class="flt_svg" xmlns="http://www.w3.org/2000/svg">
                                <defs>
                                    <filter id="img_skew_mask">
                                        <feGaussianBlur in="SourceGraphic" stdDeviation="8" result="blur" />
                                        <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="img_skew_mask" />
                                        <feComposite in="SourceGraphic" in2="img_skew_mask" operator="atop"/>
                                    </filter>
                                </defs>
                            </svg>
                        </div>
                    </div>
                </div>
                {{-- <div class="w-100 sticky-top">
                    <img class="img-fluid w-100"
                        src="{{Voyager::image($section->image)}}"
                        alt="{{ $section->getTranslatedAttribute('title', app()->getLocale(), 'fr') }}"
                        title="{{ $section->getTranslatedAttribute('title', app()->getLocale(), 'fr') }}"
                        >
                </div> --}}
            </div>
            @endif
        </div>
    </div>
</section>
@endforeach


@if ($page->type == "actualite")
<div class="container ourblog-list">
    <div class="row">
        <div class="col-md-12">
            <h2 class="sec-title mb-0"> Insights </h2>
        </div>
    </div>
</div>
@include('frontend.actualite.index', [ 'type' => "" ])

{{-- <div class="container ourblog-list">
    <div class="row">
        <div class="col-md-12">
            <h2 class="sec-title mb-0"> Insights <span class="slash"> / </span> <span>Nos événements</span> </h2>
        </div>
    </div>
</div> --}}
{{-- @include('frontend.actualite.index', [ 'type' => "" ]) --}}
{{-- @include('frontend.evenements.index', [ 'type' => "prochains_seminaires" ]) --}}
@endif



@if ($page->type == "carrieres")
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="sec-title mb-0"> Nos dernières offres d'emploi </h2>
            {{-- <div class="sec-text">
                Dans le cadre de notre stratégie de développement, nous recrutons les profils suivants :
            </div> --}}
        </div>
    </div>
</div>
@include('frontend.carrieres.index')
{{--
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="sec-title mb-0"> Candidature spontanée </h2>
            <a class="btn btn-secondary" href="mailto:recrute@sfm.co.ma">
                Rejoignez-nous
            </a>
        </div>
    </div>
</div>
@include('frontend.carrieres.form') --}}


<section class="sp-1 joinus">
    <div class="joinus-content sp-1">
        <div class="container">
            <div class="row py-md-5 align-items-center">
                {{-- <div class="col-md-6">
                    <h2 class="sec-title mb-0" style="font-size: 32px"> Candidature spontanée </h2>
                </div> --}}
                <div class="col-md-6 mx-auto text-center">
                    <a href="mailto:recrute@sfm.co.ma" class="btn btn-joinus px-md-5 py-md-3" style="font-size: 22px; padding: 18px;">
                        Rejoignez-nous
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

@endif

@if ($page->type == "institute")
<div class="container ourblog-list">
    <div class="row">
        <div class="col-md-12">
            <h2 class="sec-title mb-0"> Prochains séminaires de formation </h2>
        </div>
    </div>
</div>
@include('frontend.evenements.index', [ 'type' => "prochains_seminaires" ])

<div class="container ourblog-list">
    <div class="row">
        <div class="col-md-12">
            <h2 class="sec-title mb-0"> Précédents séminaires de formation </h2>
        </div>
    </div>
</div>
@include('frontend.evenements.index', [ 'type' => "seminaires" ])
@endif


@endsection

@push('scripts')

@endpush

