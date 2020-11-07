@extends('layouts.frontend');

@section('content')
    @include('frontend.partitions.slider',[
        'sliderService' => $sliderService ?? []
    ]);
    @include('frontend.products.best_seller',[
        'bestSell' => $bestSell ?? []
    ]);
    @include('frontend.partitions.shipping');
    @include('frontend.partitions.promotion');
    @include('frontend.products.product_feature',[
        'featureProducts' => $featureProducts ?? []
    ]);
    @include('frontend.partitions.footer');
@endsection