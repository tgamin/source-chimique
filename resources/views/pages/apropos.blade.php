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
                style="background-image: url('/img/bg-2.jpg'); height: 750px;">

                <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">

                <div class="hero-text-container justify-content-center container">

                </div>
            </div>
        </div>
    </section>

    <section class="left-img container d-flex">
        <div class="img-container col-md-6">
            <img class="sec-img" src="/img/img1.png" alt="">
        </div>
        <div class="col-md-6">
            <h1 class="section-title">Source Chimiques est une entreprise pionnière dans le secteur des détergents et
                des produits d'hygiène
            </h1>
            <div class="paragraph-container">
                <p class="paragraph">
                    Source Chimiques est une entreprise pionnière dans le secteur des détergents et des produits
                    d'hygiène
                    corporelle à l'échelle nationale et internationale. Elle se consacre principalement à la fabrication
                    industrielle d'emballages en plastiques et des matières premières destinées à la fabrication des
                    détergents,ainsi qu'à leur distribution.
                </p>

                <p class="paragraph">
                    Source Chimiques s'investit dans les technologies les plus avancées, ce qui garantit la plus haute
                    qualité
                    deses produits et assure la crédibilité de ses procédés de production, depuis le traitement des
                    matières
                    premières jusqu'au conditionnement du produit fini.
                </p>

                <p class="paragraph">
                    La mission fondamentale de l'entreprise est de concevoir et développer des produits innovants de
                    meilleure
                    qualité, répondant aux besoins des clients en matière d'hygiène, de propreté et de confort.
                </p>
            </div>
        </div>
    </section>

    <section class="right-img container d-flex">
        <div class="col-md-6">
            <div class="paragraph-container">
                <p class="paragraph">
                    Soucieuse de son impact social et environnemental, Source Chimiques investit sur le savoir-faire et
                    l'engagement vers l'excellence de tous ses collaborateurs, acteurs de progrès et piliers de son
                    avenir.
                </p>

                <p class="paragraph">
                    Au cours de ses 24 ans d'existence, Source Chimiques a puisé sa force dans sa capacité à se
                    développer, sans cesse. En 2022 la société a franchi un grand pas en se positionnant comme la
                    première marque au maroc dans le domaine des soins à domicile.
                </p>

                <p class="paragraph">
                    Source Chimiques se différencie de toute autre entreprise par sa force commerciale qui parvient à
                    garantir la disponibilité de toutes ses gammes de produits au niveau de toutes les régions grâce à
                    sa flotte de transport.
                </p>

                <p class="paragraph">
                    Afin de renfoncer sa vocation primordiale de créer et innover, source chimique adopte trois valeurs
                    principales :
                </p>

            </div>
        </div>
        <div class="img-container col-md-6">
            <img class="sec-img" src="/img/img2.png" alt="">
        </div>
    </section>

    <section class="left-img container d-flex">
        <div class="img-container col-md-6">
            <img class="sec-img" src="/img/img3.png" alt="">
        </div>
        <div class="col-md-6">
            <h1 class="section-title">
                Afin de renfoncer sa vocation primordiale de créer et innover, source chimique adopte trois valeurs
                principales :
            </h1>
            <div class="paragraph-container">
                <p class="paragraph">
                    L'engagement : Source Chimiques s'implique et s'investit pour atteindre les objectifs fixés, en
                    privilégiant l'esprit d'initiative et la satisfaction des parties prenantes.
                </p>

                <p class="paragraph">
                    L'excellence : Source Chimiques s'améliore en permanence et s'efforce à chaque fois à créer de la
                    valeur ajouté et à innover dans ses procédés et produits.
                </p>

                <p class="paragraph">
                    La cohésion : Source Chimiques s'enrichit de la diversité de ses collaborateurs, reconnaît et
                    valorise chacun dans sa singularité par le développement les potentiels et les compétences.
                </p>
            </div>
        </div>
    </section>
@endsection
