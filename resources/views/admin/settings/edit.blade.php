@extends('admin.layout.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">General Settings</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
            <li class="breadcrumb-item active">Settings</li>
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
              {!! Form::open(['url'=> route('setting.update', $setting->id), 'method' => 'POST', 'files'=>true]) !!}
              @method('PUT')

              <div class="card-body">
                <div class="form-group">
                  {!! Form::label('title', 'Site Title*') !!}
                  {!! Form::text('title', $setting->title, ['class'=>'form-control', 'placeholder'=>'Title', 'required']) !!}
                </div>
                <div class="form-group">
                  {!! Form::label('tagline', 'Tagline*') !!}
                  {!! Form::text('tagline', $setting->tagline, ['class'=>'form-control', 'placeholder'=>'Tagline']) !!}
                  <p class="text-muted mt-1"> In 250 words, explain what this site is tagline.</p>
                </div>
                <div class="form-group">
                  {!! Form::label('about', 'About*') !!}
                  {!! Form::textarea('about', $setting->about, ['class'=>'form-control', 'placeholder'=>'about', 'required']) !!}
                  <p class="text-muted mt-1"> In a few words, explain what this site is about.</p>
                </div>
                <div class="form-group">
                  {!! Form::label('location', 'Location*') !!}
                  {!! Form::text('location', $setting->location, ['class'=>'form-control', 'placeholder'=>'Location', 'required']) !!}
                  
                </div>
                <div class="form-group">
                  {!! Form::label('urls', 'Site Address(URL)*') !!}
                  {!! Form::text('url', $setting->url, ['class'=>'form-control', 'placeholder'=>'Website URL']) !!}
                  <p class="text-muted mt-1">
                    Add URL with http/https. Ex: {{url('/')}}</b>
                  </p>
                </div>
                <div class="form-group">
                  {!! Form::label('email', 'Email') !!}
                  {!! Form::email('email', $setting->email, ['class'=>'form-control', 'placeholder'=>'Email Address']) !!}
                  <p class="text-muted mt-1">
                    This address is used for admin purposes. If you change this we will send you an email at your new address to confirm it. <b>The new address will not become active until confirmed.</b>
                  </p>
                </div>
                <div class="form-group">
                  {!! Form::label('icon', 'Icon*') !!} <br>
                  <img class="mb-2" src="{{ asset("img/$setting->icon") }}" style="height: 80px; width: auto;">
                  {!! Form::file('icon', ['class'=>'form-control', 'placeholder'=>'Site Icon']) !!}
                  </p>
                </div>
                <div class="form-group">
                  {!! Form::label('logo', 'Logo*') !!} <br>
                  <img class="mb-2" src="{{ asset("img/$setting->logo") }}" style="height: 60px; width: auto;">
                  {!! Form::file('logo', ['class'=>'form-control', 'placeholder'=>'Site logo']) !!}
                  </p>
                </div>

              </div>
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
        nav_highlight("setting", "setting", "setting");

    });
  </script>
@endsection