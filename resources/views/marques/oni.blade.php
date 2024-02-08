@extends('master')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/new.css') }}">
@endsection

@section('content')
    {{-- <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">

            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            @foreach ($heros as $hero)
                <div class="carousel-item active hero-image"
                    style="background-image: url('{{ Voyager::image($hero->carousel_img) }}'); height: 750px;">
                    <img class="waves" src="/img/waves.png" alt="waves">
                    <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">

                    <!-- hero text -->
                    <div class="hero-text-container justify-content-center container">
                        <!-- hero-title -->
                        <h1 class="text-white text-start">{{ $hero->carousel_title }}</h1>
                        <!-- hero-subtitle -->
                        <h2 class="text-white text-start">{{ $hero->carousel_p }}</h2>
                        <!-- hero link -->
                        <a href="#">En savoir plus <svg class="small-arrow" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px">
                                <image x="0px" y="0px" width="12px" height="12px"
                                    xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAQAAAD8fJRsAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfnDBoQGAyqSqxiAAAAXklEQVQY073QMRGEMBgF4R0URMJJ+KUgIY4iIRJOSgYF4ADqbUKT4Y6Wgld+2z1sVgDD1eA3q90Khrv7C6lc6TMNTgSwAEFi4xhss5vBbLeZHjBcPN8YLOZxyfePOQHRxXr4by8N/QAAAABJRU5ErkJggg==">
                                </image>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>


    </div> --}}

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

    {{-- <section class="left-img container d-flex">
        <div class="img-container col-md-6">
            <img class="sec-img" src="/img/oni.png" alt="">
        </div>
        <div class="col-md-6">
            <h1 class="section-title">ONI est une marque de produits de nettoyage et d'hygiène détenue par Source
                Chimiques.
            </h1>
            <div class="paragraph-container">
                <p class="paragraph">
                    Elle a été la première à introduire la pâte lavante et le liquide vaisselle au Maroc depuit l'année
                    2000,et est réputée pour offrir des produits de nettoyage de haute qualité qui répondent aux besoins
                    des
                    consommateurs.
                </p>

                <p class="paragraph">
                    En 2022 ONI élue comme première marque au maroc choisie dans le domaine des soins à domicile.
                </p>

                <p class="paragraph">
                    Sa gamme de produits comprend liquide vaisselle, pâte lavante, nettoyant sols, Javel, savon à mains,
                    nettoyant vitres, liquide matic, assouplissant, gel nettoyant désinfectant, poudre lessive à main,
                    pate
                    degraissant, poudre lessive matic et air fraicheur...
                </p>

            </div>
            <a class="section-link" href="https://oni.ma/">www.oni.ma</a>
        </div>
    </section> --}}



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

    <div class="brand-slider">
        @foreach ($brands as $brand)
            <div class="d-flex justify-content-center"><img class="brand-slide"
                    src="{{ Voyager::image($brand->brand_logo) }}" alt="">
            </div>
        @endforeach
    </div>

    <section class="map">
        <div style="width: 100%">
            <iframe width="100%" height="420" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                src="https://maps.google.com/maps?width=100%25&amp;height=420&amp;hl=en&amp;q=46,%20bd.%20Abdelkrim%20El%20Khattabi%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20Casablanca,%2020250%20-%20Maroc+(Source%20Chimique)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a
                    href="https://www.maps.ie/population/">Calculate population in area</a>
            </iframe>
        </div>
    </section>
@endsection
