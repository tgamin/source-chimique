<section class="fourth-sec">
    <img class="waves-3" src="{{asset('img/waves-3.png')}}" alt="waves">
    <div class="container d-flex justify-content-center position-relative mt-3">
        <h1 class="title">{{ __('articles.informes')}}</h1>
    </div>
    <div class="actualites-carousel container">
        @foreach ($cards as $card)
            <a class="card-link" href="{{route('card.show', $card->id)}}">
                <div class="cards d-flex justify-content-center">
                    <div class="articles">
                        <div class="img-contain d-flex justify-content-center">
                            <img class="card-image" src="{{ Voyager::image($card->card_img) }}" alt="Card image cap">
                        </div>
                        <div class="card-content">
                            <div class="article-details d-flex justify-content-between">
                                <p>{{ $card->card_date }}</p>
                                <p>{{ $card->card_creator }}</p>
                            </div>
                            <h3 class="card-title">{{ $card->getTranslatedAttribute('card_title', app()->getLocale(), 'fr') }}</h3>
                            <h4 class="card-text">{{ $card->getTranslatedAttribute('card_description', app()->getLocale(), 'fr') }}</h4>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</section>