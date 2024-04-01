@extends('master')
@section('content')
    {{-- <div class="hero-image" style="background-image: url('/img/bg-2.jpg'); height: 750px;">
        <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">
    </div> --}}
    <div class="hero-image" style="background-image: url('{{ Voyager::image($page->cover) }}'); height: 750px;">
        <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">
    </div>

    <section class="fourth-sec">
        <div class="container d-flex justify-content-center position-relative">
            <h1 class="title">Actualités</h1>
        </div>

        <div class="container">
            <div class="row mb-md-2">
                @foreach ($cards as $card)
                    <div class="col-md-6 col-lg-4">
                        <div class="card shadow-sm border-light mb-4">
                            <a href="{{route('card.show', $card->id)}}" class="card-link position-relative">
                                <img src="{{ Voyager::image($card->card_img) }}" class="img-contain card-img-top" alt="">

                                <div class="card-top d-flex justify-content-between px-3 pt-3">
                                    <span class="card-span">{{ $card->card_date }}</span>
                                    <span class="card-span">{{ $card->card_creator }}</span>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">{{ $card->getTranslatedAttribute('card_title', app()->getLocale(), 'fr') }}</h5>
                                    <div class="post-meta">
                                        <p class="card-text">
                                            {{ $card->getTranslatedAttribute('card_description', app()->getLocale(), 'fr') }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- <div class="row py-4">
                <div class="col text-center">
                    <a href="#" class="btn btn-lg shadow btn-primary mt-1">Browse all</a>
                </div>
            </div> --}}
        </div>
    </section>

    @include('components.brands-slider')

    @include('components.map')
@endsection
