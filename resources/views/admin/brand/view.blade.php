@extends('admin.layout.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">All brands</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Brands</li>
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
                <h3 class="card-title">All Brands Information</h3>

                <div class="card-tools">
                  <a href="{{ route('brand.create') }}" class="btn btn-primary">Add New Brand</a>
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
                      <th>Title</th>
                      <th>Description</th>
                      <th>Created</th>
                      <th>Updated</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($brands as $brand)
                    <tr>
                      <td>{{$brand->title}} </td>
                      <td>{{$brand->description}} </td>
                      @php
                        $created = date('jS F, Y', strtotime($brand->created_at));
                        $updated = date('jS F, Y', strtotime($brand->updated_at));
                      @endphp
                      <td>{{$created}}</td>
                      <td>{{$updated}}</td>
                      <td style="display: inline-flex;">
                      <a href="{{route('brand.show',$brand->id)}}" class="btn btn-info" style="margin-right: 5px">View</a>
                      <a href="{{route('brand.edit', $brand->id)}}" class="btn btn-warning" style="margin-right: 5px;">Edit</a>
                      <form action="{{route('brand.destroy', $brand->id)}}" method="POST" style="">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <button type="submit" class="btn btn-danger">Delete</button>
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
              {{$brands->links()}} 
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
        nav_highlight("post-main",'post', "brands");

    });
  </script>
@endsection