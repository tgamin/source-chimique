@extends('master')

@section('content')
    @if ($page->slug == 'oni')
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
                <div class="carousel-item active hero-image" style="background-image: url('/img/bg-5.jpg'); height: 750px;">

                    <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">

                    <div class="hero-text-container justify-content-center container">


                    </div>
                </div>
            </div>
        </section>
    @elseif ($page->slug == 'hance')
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
                <div class="carousel-item active hero-image" style="background-image: url('/img/bg-7.jpg'); height: 750px;">

                    <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">

                    <div class="hero-text-container justify-content-center container">


                    </div>


                </div>
            </div>
        </section>
    @elseif ($page->slug == 'lelas')
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
                <div class="carousel-item active hero-image" style="background-image: url('/img/bg-8.jpg'); height: 750px;">

                    <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">

                    <div class="hero-text-container justify-content-center container">


                    </div>
                </div>
            </div>
        </section>
    @elseif ($page->slug == 'drem')
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
                <div class="carousel-item active hero-image" style="background-image: url('/img/bg-4.jpg'); height: 750px;">

                    <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">

                    <div class="hero-text-container justify-content-center container">

                    </div>
                </div>
            </div>
        </section>
    @endif

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
