<div class="product-detail">
    <div>
        <img src="{{ asset($product->image)}}" class="main" />
    </div>
    <div class="thumb">
        <h1>
            <h3>{{ $product->name}}</h3>

            <img src="{{asset('frontend/images/sp1.jpg')}}" />
            <img src="{{asset('frontend/images/sp2.jpg')}}" />
            <img src="{{asset('frontend/images/sp3.jpg')}}" />
            <img src="{{asset('frontend/images/sp4.jpg')}}" />
            <img src="{{asset('frontend/images/sp5.jpg')}}" />
            <img src="{{asset('frontend/images/sp1.jpg')}}" />
            <img src="{{asset('frontend/images/sp2.jpg')}}" />
            
            <p>
                <a href="{{ route('frontend.cart.store', ['productId' => $product->id ]) }}" title="Mua hàng">Mua ngay</a>
            </p>
        </h1>
    </div>
</div>