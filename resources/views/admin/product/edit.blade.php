@extends('admin.layout.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('product')}}">All Products</a></li>
            <li class="breadcrumb-item active">Edit Product</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  @include('admin.layout.include.error_and_success')

  <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Fill The Form</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              {!! Form::open(['url'=> route('product.update', $product->id), 'method' => 'POST', 'files'=>'true']) !!}
              @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    {!! Form::label('Name', 'Name') !!}
                    {!! Form::text('name', $product->name, ['class'=>'form-control', 'placeholder'=>'Product Name', 'required']) !!}

                  </div>
                  <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', $product->description, ['class'=>'form-control', 'placeholder'=>'Product Description', 'required']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('Category', 'Category') !!}
                    {!! Form::select('category_id',$category , $product->category_id, ['class'=>'form-control', 'placeholder'=>'Select Category', 'required']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('quantity', 'Quantity') !!}
                    {!! Form::text('quantity', $product->quantity, ['class'=>'form-control', 'placeholder'=>'Product Quantity', 'required']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('price', 'Unit Price') !!}
                    {!! Form::text('unit_price', $product->unit_price, ['class'=>'form-control', 'placeholder'=>'Unit Price', 'required']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('price', 'Sell Price') !!}
                    {!! Form::text('sell_price', $product->sell_price, ['class'=>'form-control', 'placeholder'=>'Sell Price', 'required']) !!}
                  </div>
                   <div class="form-group">
                    {!! Form::label('size', 'Size') !!}
                    {!! Form::text('pack_size', $product->sell_price, ['class'=>'form-control', 'placeholder'=>'Pack Size', 'required']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('brand', 'Brand') !!}
                    {!! Form::select('brand_id',$brand , $product->brand_id, ['class'=>'form-control', 'placeholder'=>'Select brand', 'required']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('thumbnail', 'Product Thumbnail') !!}

                    <div class="input-group">
                      <div class="custom-file">
                        {!! Form::file('image', ['class'=>'custom-file-input']) !!}
                        {!! Form::label('thumbnail', 'Choose file', ['class'=>'custom-file-label']) !!}
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              {!! Form::close() !!}
            </div>
            </div>
        </div>
    </div>
  </section>
@endsection
@section('script')
<script type="text/javascript">
    $(function() {
        nav_highlight("product-main", "product", "product-edit");

    });
  </script>
@endsection