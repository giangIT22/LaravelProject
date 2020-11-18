
<!DOCTYPE html>
<html>
<head>
	<title>Final Frontend Project</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=yes" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/style.css')}}" />
    <link rel="stylesheet" type="text/css" media="screen and (max-width: 480px)" href="{{ asset('frontend/css/mobile.css')}}" />
</head>
<body>
    @include('frontend.partitions.modal')
    @include('frontend.partitions.menu')
    @yield('content')
    
	<script src="{{ asset('frontend/js/jquery-3.5.1.min.js') }}"></script>
	<script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('js/app.js')}}"></script>
	<script src="{{ asset('js/product.js')}}"></script>
	<script>
		$(() => {
			$('#slider-top').owlCarousel({
				items: 1,
				loop: true,
			})

			$('.more').click(function() {
				$('.menu').slideToggle();
			})

			$('product-feature ul li').click(function() {
				$('.modal').css('visibility', 'visible');
				$("body").css("overflow", "hidden");
				$('div.product-detail').attr('show', 1);
			})

			// Code chuyển ảnh
			$('.thumb img').click(function() {
				let imgPath = $(this).attr('src')
				$('img.main').attr('src', imgPath);
				return false;
			})

			$('.modal').click(function() {
				if ($('div.product-detail').attr('show') == 1) {
					$(".modal").css("visibility", "hidden");
					$('div.product-detail').attr('show') == 0;
					$("body").css("overflow", "visible");
				}
			})
		})
	</script>
</body>
</html>