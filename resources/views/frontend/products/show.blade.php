{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @stack('style')
</head>
<body>
    <h1>Menu top</h1>

    @include('frontend.partitions.menu',[
        'menus' => $menus
    ])
    @stack('script')
</body>
</html> --}}

<div class="modal">
    <div class="product-detail">
        <div>
            <img src="{{asset('frontend//images/sp1.jpg')}}" class="main" />
        </div>
        <div class="thumb">
            <h1>
                <h3>Áo len nam cổ lọ màu mới nhất 2020</h3>

                <img src="{{asset('frontend//images/sp1.jpg')}}" />
                <img src="{{asset('frontend//images/sp2.jpg')}}" />
                <img src="{{asset('frontend//images/sp3.jpg')}}" />
                <img src="{{asset('frontend//images/sp4.jpg')}}" />
                <img src="{{asset('frontend//images/sp5.jpg')}}" />
            </h1>
        </div>
    </div>
</div>

