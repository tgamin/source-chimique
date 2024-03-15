{{-- hadi jebtha men partials.page-title dyal gropsafa
    @if (!empty($data_banner['images']) && empty($data_banner['video']))
    <div class="owl-carousel w-100 h-100" data-autoplay-speed="3000" data-items="1" data-margin="0" data-responsive-lg="1"
        data-responsive-md="1" data-loop="true" data-responsive-sm="1" data-responsive-xs="1" data-nav="false"
        data-autoplay="true" data-autoplay-timeout="3000" data-animate="fadeOut" data-draggable="false">
        @foreach ($data_banner['images'] as $image)
            <div>
                <img class="img-fluid" src="{{ asset($image['url']) }}" alt="img">
            </div>
        @endforeach
    </div>
@endif --}}


{{-- hna maghanb9ach njib data men carousel li f voyager --}}

<div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($page->gallery as $slider)
            <div class="carousel-item active carousel-img" style="background-image: url('{{ asset($slider["url"]) }}');">

                <img class="waves" src="/img/waves.png" alt="waves">
                <img class="logo-notch" src="/img/logo-notch.png" alt="logo-notch">

                <!-- hero text -->
                <div class="hero-text-container justify-content-center container">
                    <!-- hero-title -->
                    {{-- <h1 class="text-white text-start">{{ $hero->carousel_title }}</h1> --}}
                    <!-- hero-subtitle -->
                    {{-- <h2 class="text-white text-start">{{ $hero->carousel_p }}</h2> --}}
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
