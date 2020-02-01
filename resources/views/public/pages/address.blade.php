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
  @include('admin.layout.include.error_and_success')
@section('content')
<div class="row clearfix">
						<div class="col-lg-6">
	{!! Form::open(array('url' => route('checkout'), 'method'=>'POST' )) !!}
							<h3>Billing Address</h3>

							<p>Add your billing adderss.</p>

 							
 						
								<div class="col_full">
									<label for="billing-form-name">Name:</label>
									{!! Form::text('billing_name', null, ['class'=>'sm-form-control', 'required']) !!}
								</div>

								<div class="clear"></div>

								<div class="col_full">
									<label for="billing-form-address">Address:</label>
									{!! Form::text('billing_address', null, ['class'=>'sm-form-control', 'required']) !!}
								</div>

								<div class="col_full">
									<label for="billing-form-city">City / Town</label>
									{!! Form::text('billing_city', null, ['class'=>'sm-form-control', 'required']) !!}
								</div>

								<div class="col_half">
									<label for="billing-form-email">Email Address:</label>
									{!! Form::email('billing_email', null, ['class'=>'sm-form-control', 'required']) !!}
								</div>

								<div class="col_half col_last">
									<label for="billing-form-phone">Phone:</label>

									{!! Form::text('billing_phone', null, ['class'=>'sm-form-control', 'required']) !!}
								</div>
						</div>
						<div class="col-lg-6">
							<h3 class="">Shipping Address</h3>

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
								<button class="button button-3d fright">Place Order</button>
	{!! Form::close() !!}

						</div>
						<div class="w-100 bottommargin"></div>
						


</div>

@endsection

@section('footer-script')
	<script type="text/javascript">
$(document).ready(function(){ 
    $('#check-address').click(function(){
        if($('#check-address').is(':checked')){
            $('#address-field1').val($('#address-field').val());
            $('#city-field1').val($('#city-field').val());
            $('#zip-field1').val($('#zip-field').val());
            var state = $('#state-field option:selected').val();
            $('#state-field1 option[value=' + state + ']').attr('selected','selected');
        } else { 
            //Clear on uncheck
            $('#address-field1').val("");
            $('#city-field1').val("");
            $('#zip-field1').val("");
            $('#state-field1 option[value=Nothing]').attr('selected','selected');
        };

    });
});
</script>
@endsection