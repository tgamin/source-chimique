@extends('master')
{{-- @extends('master', ['heros' => $heros]) --}}

@section('css')
    <style>
        .hero-image {
            margin-top: 0;
        }
    </style>
@endsection

@section('content')
    <div id="carouselExample" class="carousel slide">
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
    </div>


    @include('components.section',[$page])
    {{--
        @foreach ($sections as $section)
        <section class="second-sec" style="background-image: url('/img/sunlight.png');">

            <div class="sec-content row container">
                <div class="image-container col-6 justify-content-center">
                    <img class="sec-img " src="{{ Voyager::image($section->image) }}" alt="">
                </div>
                <div class="section-text col-6">

                    <h1 class="text-start">{{ $section->title }}</h1>

                    <div class="text-start">{!! $section->content !!}</div>

                    <a href="/qui_sommes_nous">En savoir plus <svg class="small-arrow" xmlns="http://www.w3.org/2000/svg"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="10px" height="10px">
                            <image x="0px" y="0px" width="10px" height="10px"
                                xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAQAAAD8fJRsAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfnDBoQGAyqSqxiAAAAXklEQVQY073QMRGEMBgF4R0URMJJ+KUgIY4iIRJOSgYF4ADqbUKT4Y6Wgld+2z1sVgDD1eA3q90Khrv7C6lc6TMNTgSwAEFi4xhss5vBbLeZHjBcPN8YLOZxyfePOQHRxXr4by8N/QAAAABJRU5ErkJggg==" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    @endforeach
    --}}

    <section class="third-sec" style="background-image: url('/img/bg-3.png');">
        <img class="waves-2" src="/img/waves-2.png" alt="waves">
        <div class="container icons-container">
            <div class="icons-text">
                <img class="icons" src="/img/international.png" alt="">
                <h1><span data-purecounter-start="0" data-purecounter-end="45" data-purecounter-duration="1"
                        class="purecounter"></span> PAYS
                    <p>D'Implantation</p>
                </h1>
            </div>
            <div class="icons-text">
                <img class="icons" src="/img/network.png" alt="">
                <h1><span data-purecounter-start="0" data-purecounter-end="1100" data-purecounter-duration="1"
                        class="purecounter"></span><br>
                    <p>Collaborateurs</p>
                </h1>
            </div>
            <div class="icons-text">
                <img id="icon-strategy" class="icons" src="/img/strategy.png" alt="">
                <h1><span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1"
                        class="purecounter"></span> ANS <br>
                    <p>D'existence</p>
                </h1>
            </div>
            <div class="icons-text">
                <img class="icons" src="/img/water.png" alt="" style="margin-bottom: 8px;">
                <h1 style="margin-bottom: 9px;"><span data-purecounter-start="0" data-purecounter-end="35"
                        data-purecounter-duration="1" class="purecounter"></span>k Tonnes <br>
                    <p>De liquide produits</p>
                </h1>
            </div>
            <div class="icons-text">
                <img class="icons" src="/img/industrial.png" alt="">
                <h1><span data-purecounter-start="0" data-purecounter-end="30" data-purecounter-duration="1"
                        class="purecounter"></span>k m2<br>
                    <p>Espace couvert</p>
                </h1>
            </div>
        </div>
    </section>

    @include('components.articles')

    @include('components.brands-slider')

    @include('components.map')
    
@endsection

@push('scripts')
    <script src="js/purecounter/purecounter_vanilla.js"></script>
@endpush
