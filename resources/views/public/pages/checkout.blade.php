@extends('public.layout.master')
@section('top')
	<section id="page-title">

			<div class="container clearfix">
				<h1>Checkout</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
					
					<li class="breadcrumb-item active" aria-current="page">Checkout</li>
				</ol>
			</div>

		</section>
@endsection
@section('content')

					<div class="col_full">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-8 col-7">
										<input type="text" value="" class="sm-form-control" placeholder="Enter Coupon Code.." />
									</div>
									<div class="col-lg-4">
										<a href="#" class="button button-3d button-black nomargin">Apply Coupon</a>
									</div>
								</div>
											
							</div>
						</div>
					</div>

					<div class="row clearfix">

						<div class="col-lg-6">
							<h4>Your Orders</h4>

							<div class="table-responsive">
								<table class="table cart">
									<thead>
										<tr>
											<th class="cart-product-thumbnail">&nbsp;</th>
											<th class="cart-product-name">Product</th>
											<th class="cart-product-quantity">Quantity</th>
											<th class="cart-product-subtotal">Total</th>
										</tr>
									</thead>
									<tbody>
										@php
											$carts = \Cart::getContent();
										@endphp
										@foreach ($carts as $item)
											<tr class="cart_item">
												<td class="cart-product-thumbnail">
													<a href="#"><img width="64" height="64" src="{{ asset('img/thumbnail') }}/{{product($item->id)->thumbnail}}" alt="{{$item->name}}"></a>
												</td>

												<td class="cart-product-name">
													<a href="{{ route('product.show', $item->id) }}">{{$item->name}}</a>
												</td>

												<td class="cart-product-quantity">
													<div class="quantity clearfix">
														{{$item->quantity}}
													</div>
												</td>

												@php
												$price = $item->price;
												$quantity = $item->quantity;
												$total = $price * $quantity;
												@endphp

												<td class="cart-product-subtotal">
													<span class="amount">BDT {{$total}}</span>
												</td>
											</tr>
										@endforeach

									</tbody>

								</table>
							</div>
						</div>
						<div class="col-lg-6">
							<h4>Cart Totals</h4>

							<div class="table-responsive">
								<table class="table cart">
									<tbody>
										<tr class="cart_item">
											<td class="notopborder cart-product-name">
												<strong>Cart Subtotal</strong>
											</td>

											<td class="notopborder cart-product-name">
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

							<div class="accordion clearfix">
								<div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Direct Bank Transfer</div>
								<div class="acc_content clearfix">Donec sed odio dui. Nulla vitae elit libero, a pharetra augue. Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet.</div>

								<div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Cheque Payment</div>
								<div class="acc_content clearfix">Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed consectetur. Cras mattis consectetur purus sit amet fermentum.</div>

								<div class="acctitle"><i class="acc-closed icon-ok-circle"></i><i class="acc-open icon-remove-circle"></i>Paypal</div>
								<div class="acc_content clearfix">Nullam id dolor id nibh ultricies vehicula ut id elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Duis mollis, est non commodo luctus. Aenean lacinia bibendum nulla sed consectetur.</div>
							</div>
							{!! Form::open(array('url' => route('store.order'), 'method'=>'POST' )) !!}
								@method('PUT')

									{!! Form::hidden('billing_name', $data->billing_name, ['class'=>'sm-form-control', 'required']) !!}

									{!! Form::hidden('billing_address', $data->billing_address, ['class'=>'sm-form-control', 'required']) !!}

									{!! Form::hidden('billing_city', $data->billing_city, ['class'=>'sm-form-control', 'required']) !!}

									{!! Form::hidden('billing_email', $data->billing_email, ['class'=>'sm-form-control', 'required']) !!}

									{!! Form::hidden('billing_phone', $data->billing_phone, ['class'=>'sm-form-control', 'required']) !!}

									{!! Form::hidden('shipping_name', $data->shipping_name, ['class'=>'sm-form-control', 'required']) !!}

									{!! Form::hidden('shipping_address', $data->shipping_address, ['class'=>'sm-form-control', 'required']) !!}

									{!! Form::hidden('shipping_city', $data->shipping_city, ['class'=>'sm-form-control', 'required']) !!}

									{!! Form::hidden('shipping_message', $data->shipping_message, ['class'=>'sm-form-control']) !!}

								<button class="button button-3d fright">Place Order</button>
							{!! Form::close() !!}
						</div>
					</div>
@endsection