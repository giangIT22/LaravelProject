@extends('layouts.frontend');

@section('content')
    @include('frontend.products.product_feature',[
        'headTitle'       => $headTitle ,
        'featureProducts' => $featureProducts ?? []
    ]);
    @include('frontend.partitions.shipping');
    @include('frontend.partitions.footer');
@endsection