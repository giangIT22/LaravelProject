<product-feature>
    <h3>{{  $headTitle ?? null}}</h3>
    <br>
    <small>Newest trends from top brands</small>

    <div class="container">
        <ul>
            @foreach ($featureProducts as $product)
                <li>
                    <img src="{{ $product->image}}" />
                    <a href="">{{ $product->name}}</a>
                    <p>{{ number_format($product->price) }} vnd</p>
                </li>
            @endforeach
        </ul>
    </div>
</product-feature>