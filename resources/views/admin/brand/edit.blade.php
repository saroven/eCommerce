@extends('admin.layout.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit brand</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('brand.index') }}">All brands</a></li>
            <li class="breadcrumb-item active">Add brand</li>
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
              {!! Form::open(['url'=> route('brand.update', $brand->id), 'method' => 'POST']) !!}
              @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', $brand->title, ['class'=>'form-control', 'placeholder'=>'Title', 'required']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', $brand->description, ['class'=>'form-control', 'placeholder'=>'Description']) !!}
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
        nav_highlight("post-main",'post', "categories");

    });
  </script>
@endsection