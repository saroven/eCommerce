@extends('admin.layout.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Add User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('user.index') }}">All Users</a></li>
            <li class="breadcrumb-item active">Add user</li>
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
              {!! Form::open(['url'=> route('user.store'), 'method' => 'POST']) !!}
                <div class="card-body">
                  <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name', 'required']) !!}

                  </div>
                  <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email', 'required']) !!}

                  </div>
                  <div class="form-group">
                  	{!! Form::label('password', 'Password') !!}
                    {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password', 'required']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('re-password', 'Re-Type Password') !!}
                    {!! Form::password('repassword', ['class'=>'form-control', 'placeholder'=>'Re-Type Password', 'required']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('gender', 'Gender') !!}
                    {!! Form::select('gender_id', $genders, null,['class'=>'form-control', 'placeholder'=>'Select Gender', 'required']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('role', 'Role') !!}
                    {!! Form::select('role_id', $roles, null,['class'=>'form-control', 'placeholder'=>'Select Role', 'required']) !!}
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
        nav_highlight("user-main", "user", "user-add");

    });
  </script>
@endsection