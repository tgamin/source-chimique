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

    <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($heros as $hero)
                <div class="carousel-item active carousel-img"
                    style="background-image: url('{{ Voyager::image($hero->carousel_img) }}');">
                    <img class="waves" src="/img/waves.png" alt="waves">
                    <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">

                    <!-- hero text -->
                    <div class="hero-text-container justify-content-center container">
                        <!-- hero-title -->
                        <h1 class="text-white text-start">{{ $hero->carousel_title }}</h1>
                        <!-- hero-subtitle -->
                        <h2 class="text-white text-start">{{ $hero->carousel_p }}</h2>
                        <!-- hero link -->
                        {{-- <a href="#">En savoir plus <svg class="small-arrow" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px">
                                <image x="0px" y="0px" width="12px" height="12px"
                                    xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAQAAAD8fJRsAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfnDBoQGAyqSqxiAAAAXklEQVQY073QMRGEMBgF4R0URMJJ+KUgIY4iIRJOSgYF4ADqbUKT4Y6Wgld+2z1sVgDD1eA3q90Khrv7C6lc6TMNTgSwAEFi4xhss5vBbLeZHjBcPN8YLOZxyfePOQHRxXr4by8N/QAAAABJRU5ErkJggg==">
                                </image>
                            </svg>
                        </a> --}}
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    @include('components.section', [$page])

    <section class="third-sec" style="background-image: url('/img/bg-3.png');">
        <img class="waves-2" src="/img/waves-2.png" alt="waves">
        <div class="container icons-container">
            <div class="icons-text">
                <img class="icons" src="/img/international.png" alt="">
                <h1><span data-purecounter-start="0" data-purecounter-end="6" data-purecounter-duration="1"
                        class="purecounter"></span> PAYS
                    <p>Distributions</p>
                </h1>
            </div>
            <div class="icons-text">
                <img class="icons" src="/img/network.png" alt="">
                <h1><span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="1"
                        class="purecounter"></span><br>
                    <p>Collaborateurs</p>
                </h1>
            </div>
            <div class="icons-text">
                <img class="icons" src="/img/strategy.png" alt="">
                <h1><span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1"
                        class="purecounter"></span> ANS <br>
                    <p>D'existence</p>
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
    <script>
        new PureCounter();
    </script>
@endpush
