@extends('admin.layout.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">All product</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">products</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

@include('admin.layout.include.error_and_success')
<section class="content">
    <div class="container-fluid">
    	<div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">All products Informations</h3>

                <div class="card-tools">
                  <a href="{{ route('product.create') }}" class="btn btn-primary">Add New product</a>
                  {{-- <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div> --}}
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>Category </th>
                      <th>Sell Price</th>
                      <th>Thumbnail</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                      
                  <tbody>
                    @foreach($products as $product)
                    <tr>
                      <td>{{$product->name}}</td>

                      <td>{{Illuminate\Support\Str::limit($product->description, 20)}} </td>

                      <td>{{$product->category->title}} </td>

                      <td>{{$product->sell_price}} </td>

                    <td><img style="height:100px;weight:auto;" src="@if (empty($product->thumbnail))
                      {{ asset('img\thumbnail\no-thumbnail.png') }}
                    @else
                      {{ asset('img/thumbnail') }}/{{$product->thumbnail}}
                    @endif" alt="{{config('app.name')}}"> </td>
                      
                      <td>
                      @if ($product->status == 1)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inactive</span>
                      @endif
                    </td>
                      <td>
                      <a class="btn btn-primary btn-sm mb-1" target="_blank" href="{{route('product.show',$product->id)}}">
                        <i class="fas fa-folder">
                        </i>
                        View
                      </a>

                    <a class="btn btn-warning btn-sm mb-1" href="{{route('product.edit', $product->id)}}">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </a>
                      <form action="{{route('product.destroy', $product->id)}}" method="post" style="">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger btn-sm"> Delete</button>
                    </form>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <div class="float-right">
            	{{$products->links()}} 
            </div>
            <!-- /.card -->
          </div>
      	</div>
    </div>
</section>
@endsection
@section('script')
<script type="text/javascript">
    $(function() {
        nav_highlight("product-main", "product", "product-all");

    });
  </script>
@endsection