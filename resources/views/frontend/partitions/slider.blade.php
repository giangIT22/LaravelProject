<slider>
    <div class="container-slider owl-carousel" id="slider-top">
        @foreach ($sliderService as $item)
            <div class="slide-item">
                <img src="{{ $item->image }}" />
                <h2>
                    <span>{{ $item->title }}</span>
                    <small>Woocommerce</small>
                </h2>
            </div>
        @endforeach
    </div>
</slider>
