@extends('master')
@section('css')
    <style>
        .section-title {
            font-size: 2rem;
            margin-top: 0.8rem;
        }

        .paragraph-container.right-p {
            width: 95%;
            font-size: 1.2rem;
        }

        .actualite-sec {
            padding-top: 30px;
            padding-bottom: 40px;
        }

        .img-container-costum {
            width: 400px;
            height: 400px;
            border-radius: 12px;
            box-shadow: 0px 4px 12px 0px rgb(0 0 0 / 30%);
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            margin-right: 40px;
        }

        @media (max-width:768px) {
            .sec-img {
                margin-left: 0;
                margin-right: 10vw;
            }
        }

        .hero-image {
            background-color: rgba(0, 0, 0, 0.131);
        }
    </style>
@endsection
@section('content')
    <div class="hero-image" style="background-image: url('{{ Voyager::image($article->card_img) }}'); height: 350px;">
        <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">
    </div>

    <section class="actualite-sec left-img container my-4">
        <div class="row">
            <div class="img-container img-container-costum col-md-6 d-flex justify-content-end"
                style="background-image: url('{{ Voyager::image($article->card_img) }}')">
                {{-- <img class="sec-img" src="{{ Voyager::image($article->card_img) }}" alt=""> --}}
            </div>
            <div class="col-md-6">
                <h1 class="section-title">{{ $article->card_title }}</h1>
                <div class="paragraph-container right-p">
                    {{ $article->card_description }}
                </div>
            </div>
        </div>
    </section>

    @include('components.brands-slider')

    {{-- @include('components.articles') --}}
    {{-- @include('components.map') --}}
@endsection
