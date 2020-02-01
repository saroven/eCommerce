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

					<div class="clear"></div>

					<div class="row clearfix">

						<div class="col-lg-12">
							<h3 class="">Shipping Address</h3>

 							{!! Form::open(array('url' => route('checkout'), 'method'=>'POST' )) !!}
 							@csrf
								<div class="col_full">
									<label for="shipping-form-name">Name:</label>
									{!! Form::text('shipping_name', null, ['class'=>'sm-form-control', 'required']) !!}
								</div>

								<div class="col_full">
									<label for="shipping-form-address">Address:</label>
									{!! Form::text('shipping_address', null, ['class'=>'sm-form-control', 'required']) !!}
								</div>


								<div class="col_full">
									<label for="shipping-form-city">City / Town</label>
									{!! Form::text('shipping_city', null, ['class'=>'sm-form-control', 'required']) !!}
								</div>

								<div class="col_full">
									<label for="shipping-form-message">Notes <small>*</small></label>
									{!! Form::textarea('shipping_message', null, ['class'=>'sm-form-control']) !!}
								</div>

								<div class="col_half">

									<button class="btn btn-lg btn-info">Submit</button>

								</div>


							{!! Form::close() !!}
						</div>
						
					</div>
@endsection