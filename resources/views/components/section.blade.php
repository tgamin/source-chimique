@php
    $sections = $page->sections()->active()->orderBy('order')->get();
@endphp

{{-- <div class="container">
    <h1 class="title text-center my-5">{{ $page->getTranslatedAttribute('title', app()->getLocale(), 'fr') }}</h1>
</div> --}}


@foreach ($sections as $section)
    @php
        $output = filterStyleAttributes($section->getTranslatedAttribute('content', app()->getLocale(), 'fr'));
    @endphp

    @if ($page->slug == 'home')
        @section('css')
            <style>
                @media (max-width:1200px) {
                    .sec-img {}
                }
            </style>
        @endsection
        <section class="second-sec" style="background-image: url('/img/sunlight.png');">
            <div class="sec-content row container">
                <div class="image-container col-6 justify-content-center">
                    <img class="sec-img " src="{{ Voyager::image($section->image) }}" alt="">
                </div>
                <div class="section-text col-6">

                    <h1 class="text-start">{{ $section->title }}</h1>

                    <div class="text-start">{!! $section->content !!}</div>

                    <a href="/qui_sommes_nous">En savoir plus <svg class="small-arrow"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10px"
                            height="10px">
                            <image x="0px" y="0px" width="10px" height="10px"
                                xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAMCAQAAAD8fJRsAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAAAHdElNRQfnDBoQGAyqSqxiAAAAXklEQVQY073QMRGEMBgF4R0URMJJ+KUgIY4iIRJOSgYF4ADqbUKT4Y6Wgld+2z1sVgDD1eA3q90Khrv7C6lc6TMNTgSwAEFi4xhss5vBbLeZHjBcPN8YLOZxyfePOQHRxXr4by8N/QAAAABJRU5ErkJggg==" />
                        </svg>
                    </a>
                </div>
            </div>
        </section>
    @else
        @section('css')
            <style>
                /* new css */
                .logo-notch {
                    right: 40%;
                }

                .img-container.col-md-6 {
                    position: relative;
                }

                section.container {
                    /* height: 35rem; */
                    margin-top: 3rem;
                }

                .left-img,
                .right-img {
                    margin-top: 4rem;
                }

                .sec-img {
                    width: 440px;
                }

                .left-img .sec-img {
                    margin-left: 2rem;
                    /* position: absolute; */
                    height: 600px;
                    width: auto;
                    position: sticky;
                    top: 80px;
                }

                .right-img .sec-img {
                    height: 600px;
                    width: auto;
                    position: sticky;
                    top: 80px;
                }

                @media(max-width:520px) {

                    .right-img .sec-img,
                    .left-img .sec-img {
                        height: 410px;
                    }

                }

                .waves {
                    display: none;
                }

                .mot {
                    margin-bottom: 24rem;
                }

                /* end new css */
            </style>
        @endsection
        
        @if ($section->type == 'img-right')
            <section class="right-img container d-flex">
                <div class="row">
                    <div class="left-content col-md-6">
                        <h1 class="section-title">{{ $section->title }}</h1>
                        <div class="paragraph-container left-p">
                            {!! $section->content !!}
                        </div>
                    </div>
                    <div class="img-container col-md-6 d-flex justify-content-start">
                        <img class="sec-img" src="{{ Voyager::image($section->image) }}" alt="">
                    </div>
                </div>
            </section>
        @endif
        @if ($section->type == 'img-left')
            <section class="left-img container">
                <div class="row">
                    <div class="img-container col-md-6 d-flex justify-content-end">
                        <img class="sec-img" src="{{ Voyager::image($section->image) }}" alt="">
                    </div>
                    <div class="col-md-6">
                        <h1 class="section-title">{{ $section->title }}</h1>
                        <div class="paragraph-container right-p">
                            {!! $section->content !!}
                        </div>
                    </div>
                </div>
            </section>
        @endif
    @endif
@endforeach
