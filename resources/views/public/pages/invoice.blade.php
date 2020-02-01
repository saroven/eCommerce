            
@extends('public.layout.master')
@section('top')
  <section id="page-title">

      <div class="container clearfix">
        <h1>CART</h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
          
          <li class="breadcrumb-item active" aria-current="page">Invoice</li>
        </ol>
      </div>

    </section>
@endsection
  @include('admin.layout.include.error_and_success')
@section('content')
  <div class="card shadow bg-white rounded">
    <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> {{config('app.name')}}
                    <small class="float-right">Date: {{date('jS F, Y', strtotime($order->created_at))}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>{{config('app.name')}}</strong>
                    <br>
                    {{settings()->address}}<br>
                    {{-- Phone: {{settings()->phone}}<br> --}}
                    Email: {{settings()->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{$order->billing_name}}</strong><br>
                    {{$order->billing_address}}<br>
                    {{$order->billing_city}}<br>
                    Phone: {{$order->billing_phone}}<br>
                    Email: {{$order->billing_email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #{{$order->id}}</b><br>
                  <br>
                  {{-- <b>Order ID:</b> 4F3S8J<br> --}}
                  <b>Payment Due:</b> {{date('jS F, Y', strtotime($order->created_at))}}<br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Qty</th>
                      <th>Product</th>
                      <th>Description</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($items as $item)
                        <tr>
                          <td>{{$item->quantity}}</td>
                          <td>{{$item->product->name}}</td>
                          <td>{!!  substr(strip_tags($item->product->description), 0, 150) !!}</td>
                          <td>{{$item->product->sell_price * $item->quantity}}</td>
                        </tr>
                      @endforeach
                    

                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                  <img src="../../dist/img/credit/visa.png" alt="Visa">
                  <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
                  <img src="../../dist/img/credit/american-express.png" alt="American Express">
                  <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due {{date('jS F, Y', strtotime($order->created_at))}}</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>BDT {{$order->subtotal}}</td>
                      </tr>
                      <tr>
                        <th>Tax (0%)</th>
                        <td>BDT 0</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td>BDT 0</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td>BDT {{$order->total}}</td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </button>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
  </div>
  </div>
  <!-- /.invoice -->

@endsection

@section('footer-script')
  
@endsection

            