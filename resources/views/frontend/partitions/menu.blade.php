<header>
    <div class="container">
        <div class="logo">
            <a href="/">ZoMA</a>
        </div>
        <x-menu></x-menu>
        <div class="icon">
            <div class="wrap">
                <a href="{{ route('frontend.cart.index') }}">
					<span class="cart">
						<small>{{ totalCart() }}</small>
					</span>
				</a>
                <span class="search"></span>
                <span class="more"></span>
            </div>
        </div>
    </div>
</header>