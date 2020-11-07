<best-seller>
    <div class="container">
        <ul>
            <li>
                <div>
                    <h3>Best sellers</h3>
                    <small>The best productions from us</small>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </p>
                </div>	
            </li>
            @foreach ($bestSell as $item)
                <li>
                    <img src="{{ $item->image }}" />
                    <a href="">{{ $item->name}}</a>
                    <p>{{ number_format($item->price)}} vnd</p>
                    <div class="action">
                        <a href="#" class="cart"></a>
                        <a href="#" class="heart"></a>
                        <a href="#" class="compare"></a>
                    </div> 
                </li>
            @endforeach
        </ul>
    </div>
</best-seller>