@php
	dd(scopeMightAlsoLike());
@endphp

@extends('public.layout.master')
@section('style')

	<link rel="stylesheet" href="{{ asset('fontend/css/swiper.css') }}" type="text/css" />

@endsection

@section('top')

@include('public.layout.include.slider')

@endsection


@section('content')
	<div id="shop" class="shop product-3 grid-container clearfix" data-layout="fitRows">
{{-- item 12 --}}
		@foreach ($products as $product)
			<div class="product clearfix">
			<div class="product-image">
				<a href="#"><img src="{{ asset('img/thumbnail') }}/{{$product->thumbnail}}" alt="{{$product->name}}"></a>
				<a href="#"><img src="{{ asset('img/thumbnail') }}/{{$product->thumbnail}}" alt="{{$product->name}}"></a>
				<div class="sale-flash">50% Off*</div>
				<div class="product-overlay">
					<a href="{{ route('cart.add', $product->id) }}" class="add-to-cart"><i class="icon-shopping-cart"></i><span> Add to Cart</span></a>
					<a href="{{ route('product.show', $product->id) }}" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
				</div>
			</div>
			<div class="product-desc center">
				<div class="product-title"><h3><a href="{{ route('product.show', $product->id) }}">{{ $product->name }}</a></h3></div>
				
				<div class="product-price">{{-- <del>2500</del> --}} <ins>{{ $product->sell_price }}</ins></div>
				<div class="product-rating">
					<i class="icon-star3"></i>
					<i class="icon-star3"></i>
					<i class="icon-star3"></i>
					<i class="icon-star3"></i>
					<i class="icon-star-half-full"></i>
				</div>
			</div>
		</div>
		@endforeach


	</div>
@endsection