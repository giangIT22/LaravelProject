@extends('layouts.frontend')

@section('content')
	<h3 align="center" class="heading-cart">GIỎ HÀNG CỦA BẠN</h3>
	<br/>
	<div class="container">
	<form action="{{ route('cart.update') }}" method="post">
		@csrf
		<table class="list-cart">
			<tr>
				<th>#ID</th>
				<th>Tên sản phẩm</th>
				<th>Giá tiền</th>
				<th>Số lượng</th>
				<th>Thành tiền</th>
				<th>&nbsp;</th>
			</tr>
			@if ($products->count() > 0)

			@foreach ($products as $product)
			<tr>
				<td width="50" align="center">{{ $product->id }}</td>
				<td>{{ $product->name }}</td>
				<td align="right">{{ number_format($product->price) }}</td>
				<td width="100">
					<input type="number" name="qty[{{ $product->id }}]" value="{{ $product->qty }}" size="20" />
				</td>
				<td align="right">{{  number_format($product->price * $product->qty) }}</td>
				<td width="120">
					<a onclick="return confirm('Bạn muốn xóa không?')" 
						href="{{ route('cart.destroy', ['productId' => $product->id]) }}" 
						title="Xóa sản phẩm">Xóa sản phẩm</a>
				</td>
			</tr>
			@endforeach
			<tr>
				<td colspan="6" align="right">
					<button>Cập nhật</button>
					<a onclick="return confirm('Bạn muốn xóa không?')" href="{{ route('cart.destroy', ['productId' => 'all']) }}">Xóa tất cả</a></td>
			</tr>
			@else
				<tr>
					<td align="center" colspan="6">Không có sản phẩm nào trong giỏ!</td>
				</tr>
			@endif
		</table>
	</form>

	@if ($products->count() > 0)
		@include('frontend.carts.checkout')
	@endif

	</div>
	@include('frontend.partitions.footer')
@endsection