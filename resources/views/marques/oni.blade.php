@extends('master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/new.css') }}">
@endsection

@section('content')

    <section id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            <div class="carousel-item active hero-image"
                style="background-image: url('/img/bg-5.jpg'); height: 750px;">

                <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">

                <div class="hero-text-container justify-content-center container">


                </div>
            </div>
        </div>
    </section>

    {{-- @include('components.section',[$page]) --}}
     @include('frontend.cms.index')  {{--not working --}}


    <section class="fourth-sec">
        <img class="waves-3" src="img/waves-3.png" alt="waves">
        <div class="container d-flex justify-content-center position-relative">
            <h1>Soyez informés des dernières actualités</h1>
        </div>
        <div class="actualites-carousel container">
            @foreach ($cards as $card)
                <div class="cards">
                    <div class="articles">
                        <div class="img-contain d-flex justify-content-center">
                            <img class="card-image" src="{{ Voyager::image($card->card_img) }}" alt="Card image cap">
                        </div>
                        <div class="card-content">
                            <div class="article-details d-flex justify-content-between">
                                <p>{{ $card->card_date }}</p>
                                <p>{{ $card->card_creator }}</p>
                            </div>
                            <h3 class="card-title">{{ $card->card_title }}</h3>
                            <h4 class="card-text">{{ $card->card_description }}</h4>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>


    @include('components.brands-slider')
    {{-- <div class="brand-slider">
        @foreach ($brands as $brand)
            <div class="d-flex justify-content-center"><img class="brand-slide"
                    src="{{ Voyager::image($brand->brand_logo) }}" alt="">
            </div>
        @endforeach
    </div> --}}

    @include('components.map')
    {{-- <section class="map">
        <div style="width: 100%">
            <iframe width="100%" height="420" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                src="https://maps.google.com/maps?width=100%25&amp;height=420&amp;hl=en&amp;q=46,%20bd.%20Abdelkrim%20El%20Khattabi%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20Casablanca,%2020250%20-%20Maroc+(Source%20Chimique)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                    href="https://www.maps.ie/population/">Calculate population in area</a>
            </iframe>
        </div>
    </section> --}}
@endsection
