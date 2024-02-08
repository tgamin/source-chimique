<div class="brand-slider">
    @foreach ($brands as $brand)
        <div class="d-flex justify-content-center"><img class="brand-slide"
                src="{{ Voyager::image($brand->brand_logo) }}" alt="">
        </div>
    @endforeach
</div>