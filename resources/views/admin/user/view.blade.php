@extends('admin.layout.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">All User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Users</li>
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
                <h3 class="card-title">All Users Informations</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    
                  <a href="{{route('user.create')}}" class="btn btn-info">Add User</a>

                    {{-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div> --}}
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Joined On</th>
                      <th>Status</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td>{{$user->role->title}}</td>
                      <td>
                      	@php
                      		$d = date('jS  F, Y',strtotime($user->created_at));
                      	@endphp
                      	{{$d}}
                      </td>
                      <td>
                      	@if ($user->status == 1)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Inactive</span>
                      @endif
                      </td>
                      <td style="display: inline-flex;">
                      	<a style="margin-right: 5px" href="{{ route('user.show', $user->id) }}" class="btn btn-info">Profile</a>
                      	<a style="margin-right: 5px" href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">Edit</a>
                      	<form action="{{ route('user.destroy', $user->id) }}" method="POST">
                      		@csrf
                      		@method('DELETE')
                      		<button class="btn btn-danger">Delete</button>
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
            	{{$users->links()}} 
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
        nav_highlight("user-main", "user", "user-all");

    });
  </script>
@endsection