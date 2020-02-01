@extends('public.layout.master')
@section('top')
	<section id="page-title">

			<div class="container clearfix">
				<h1>CART</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
					
					<li class="breadcrumb-item active" aria-current="page">Cart</li>
				</ol>
			</div>

		</section>
@endsection
  @include('admin.layout.include.error_and_success')
@section('content')
	
	@if (empty(auth()->user()->role_id))
		<div class="col_half">
		<div class="card">
			<div class="card-body">
				Returning customer? <a href="{{ route('login') }}">Click here to login</a>
			</div>
		</div>
	</div>

	<div class="clear"></div>
	@endif

	<div class="table-responsive">
						<table class="table cart">
							<thead>
								<tr>
									<th class="cart-product-remove">&nbsp;</th>
									<th class="cart-product-thumbnail">&nbsp;</th>
									<th class="cart-product-name">Product</th>
									<th class="cart-product-price">Unit Price</th>
									<th class="cart-product-quantity">Quantity</th>
									<th class="cart-product-subtotal">Total</th>
								</tr>
							</thead>
							<tbody>
						<form method="POST" action="{{ route('cart.update') }}">
							@csrf
								@php
									$carts = \Cart::getContent();
								@endphp
								@foreach ($carts as $item)
									<tr class="cart_item" id="tr-{{$item->id}}">
									<td class="cart-product-remove">
										<a href="#" onclick="remove({{$item->id}})" class="remove" title="Remove this item"><i class="icon-trash2"></i></a>
									</td>

									<td class="cart-product-thumbnail">
										<a href="{{ route('product.show', $item->id) }}"><img width="64" height="64" src="{{ asset('img/thumbnail') }}/{{product($item->id)->thumbnail}}" alt="{{$item->name}}"></a>
									</td>

									<td class="cart-product-name">
										<a href="{{ route('product.show', $item->id) }}">{{$item->name}}</a>
									</td>

									<td class="cart-product-price">
										<span  class="amount">BDT {{$item->price}}</span>
									</td>

									<td class="cart-product-quantity">
										<div class="quantity clearfix">
											<input type="hidden" name="id[]" value="{{$item->id}}">
											<input type="button" value="-" onclick="updateQty({{$item->id}},{{$item->price}})"  class="minus">
											<input type="text" id="qty-{{$item->id}}" onchange="updateQty({{$item->id}},{{$item->price}})" name="qty[]" value="{{$item->quantity}}" class="qty" />
											<input type="button" value="+"onclick="updateQty({{$item->id}},{{$item->price}})"  class="plus">
										</div>
									</td>
									@php
									$price = $item->price;
									$quantity = $item->quantity;
									$total = $price * $quantity;
									@endphp
									<td class="cart-product-subtotal">
										<span id="price-{{$item->id}}" class="amount">BDT {{$total}}</span>
									</td>
								</tr>
								@endforeach

								<tr class="cart_item">
									<td colspan="6">
										<div class="row clearfix">
											
											<div class="col-lg-12 col-12 nopadding">
												
												<button class="button button-3d nomargin fright">Update Cart</button>
												<a href="{{ route('address') }}" class="button button-3d notopmargin fright">Proceed to Checkout</a>
											</div>
										</div>
									</td>
								</tr>
								</tbody>
							</table>						
					</form>
				</div>


				<div class="row clearfix">
						<div class="col-lg-6 clearfix">
							<h4>Calculate Shipping</h4>
							<form>
								<div class="col_full">
									<select class="sm-form-control">
										<option value="AX">&#197;land Islands</option>
										<option value="AF">Afghanistan</option>
										<option value="AL">Albania</option>
									</select>
								</div>
								<div class="col_half">
									<input type="text" class="sm-form-control" placeholder="State / Country" />
								</div>

								<div class="col_half col_last">
									<input type="text" class="sm-form-control" placeholder="PostCode / Zip" />
								</div>
								<a href="#" class="button button-3d nomargin button-black">Update Totals</a>
							</form>
						</div>

						<div class="col-lg-6 clearfix">
							<h4>Cart Totals</h4>

							<div class="table-responsive">
								<table class="table cart">
									<tbody>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Cart Subtotal</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount">BDT {{\Cart::getSubTotal()}}</span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Shipping</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount">Free Delivery</span>
											</td>
										</tr>
										<tr class="cart_item">
											<td class="cart-product-name">
												<strong>Total</strong>
											</td>

											<td class="cart-product-name">
												<span class="amount color lead"><strong>BDT {{\Cart::getSubTotal()}}</strong></span>
											</td>
										</tr>
									</tbody>

								</table>
							</div>
						</div>
					</div>
@endsection

@section('footer-script')
 	<script>

	function remove(pid)
	{
	$("#tr-"+pid).hide();
	}
	function updateQty(pid,price)
	{
		// console.log(pid);
		var qty = $("#qty-"+pid).val();
		// console.log(qty);
		var url = "{{url("update-cart")}}/"+pid+"/"+qty;
		// console.log(url);
		// console.log(price);
		var newPrice = qty*price;
		$("#price-"+pid).html("BDT "+newPrice);
		$.ajax({
		  method: "GET",
		  url: url,
		  // data: { product_id: pid, qty: qty }
		})
		  .done(function( msg ) {
		    alert( "Data Saved: " + msg );
		  });
	}
	</script>
@endsection