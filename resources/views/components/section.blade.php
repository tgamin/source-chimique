@php
    $sections = $page
        ->sections()
        ->active()
        ->orderBy('order')
        ->get();
@endphp

{{-- <div class="container">
    <h1 class="title text-center my-5">{{ $page->getTranslatedAttribute('title', app()->getLocale(), 'fr') }}</h1>
</div> --}}


@foreach ($sections as $section)
    @php
        $output = filterStyleAttributes($section->getTranslatedAttribute('content', app()->getLocale(), 'fr'));
    @endphp

    @if ($page->slug == 'home')
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
                    height: 35rem;
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
                    margin-left: 5rem;
                    position: absolute;
                    right: 20px;
                    height: 95%;
                    width: auto;
                }

                .right-img .sec-img {
                    margin-left: 5rem;
                    position: absolute;
                    left: -3rem;
                    height: 95%;
                    width: auto;
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
                <div class="left-content col-md-6">
                    <h1 class="section-title">{{ $section->title }}</h1>
                    <div class="paragraph-container">
                        {!! $section->content !!}
                    </div>
                </div>
                <div class="img-container col-md-6">
                    <img class="sec-img" src="{{ Voyager::image($section->image) }}" alt="">
                </div>
            </section>
        @endif
        @if ($section->type == 'img-left')
            <section class="left-img container d-flex">
                <div class="img-container col-md-6">
                    <img class="sec-img" src="{{ Voyager::image($section->image) }}" alt="">
                </div>
                <div class="col-md-6">
                    <h1 class="section-title">{{ $section->title }}</h1>
                    <div class="paragraph-container">
                        {!! $section->content !!}
                    </div>
                </div>
            </section>
        @endif
    @endif

    {{-- <section class="my-5 cms-block">
        <div class="container">
            <div class="row ">
                @if ($section->type == 'img-right')
                    <div class="col-md-6 pe-5 cms-content">
                        <h3>{{ $section->getTranslatedAttribute('title', app()->getLocale(), 'fr') }}</h3>
                        {!! $output !!}
                    </div>
                    <div class="col-md-6 img img-right"
                        style="background-image: url({{ Voyager::image($section->image) }})">
                        @if ($page->slug == 'a-propos')
                            <div class="time-line">
                                @foreach (getTimeLine() as $time_line)
                                    <div>
                                        <div class="card-time-line">
                                            <img src="{{ Storage::url($time_line->image) }}" alt="">
                                            <h2>
                                                {{ $time_line->title }}
                                                <p>{{ $time_line->subtitle }}</p>
                                            </h2>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                @endif

                @if ($section->type == 'img-left')
                    <div class="col-md-6 img img-left"
                        style="background-image: url({{ Voyager::image($section->image) }})">
                    </div>
                    <div class="col-md-6 ps-5 cms-content">
                        <h3>{{ $section->getTranslatedAttribute('title', app()->getLocale(), 'fr') }}</h3>
                        {!! $output !!}
                    </div>
                @endif
            </div>
        </div>
    </section> --}}
@endforeach
