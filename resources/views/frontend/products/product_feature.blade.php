<product-feature>
    <h3>{{  $headTitle ?? null}}</h3>
    <br>
    <small>Newest trends from top brands</small>

    <div class="container">
        <ul>
            @foreach ($featureProducts as $product)
                <li>
                    <img src="{{ asset($product->image)}}" class="product-modal-detail" data-id="{{ $product->id}}" />
                    <a href="javascript:void(0)" class="product-modal-detail" data-id="{{ $product->id}}" >{{ $product->name}}</a>
                    <p>{{ number_format($product->price) }} vnd</p>
                </li>
            @endforeach
        </ul>
    </div>
</product-feature>