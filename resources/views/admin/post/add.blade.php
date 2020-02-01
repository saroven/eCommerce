@extends('admin.layout.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Add Post</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{url('post')}}">All Posts</a></li>
            <li class="breadcrumb-item active">Add Post</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
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
              {!! Form::open(['url'=> route('post.store'), 'method' => 'POST']) !!}
                <div class="card-body">
                  <div class="form-group">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Post Title', 'required']) !!}

                  </div>
                  <div class="form-group">
                    {!! Form::label('content', 'Content') !!}
                    {!! Form::textarea('content', null, ['class'=>'form-control', 'placeholder'=>'Post Content', 'required']) !!}
                  </div>
                  <div class="form-group">
                  	{!! Form::label('Category', 'Category') !!}
                  	{!! Form::select('category', $categories, null, ['class'=>'form-control', 'placeholder'=>'Select Category', 'required']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('tags', 'Tags') !!}
                    {!! Form::text('tags', null, ['class'=>'form-control', 'placeholder'=>'Tags', 'required']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class'=>'form-control', 'placeholder'=>'Ex: hello-world', 'required']) !!}
                  </div>
                  <div class="form-group">
                    {!! Form::label('thumbnail', 'Thumbnail') !!}
                    <div class="input-group">
                      <div class="custom-file">
                      	{!! Form::file('thumbnail', ['class'=>'custom-file-input', 'name'=>'image']) !!}
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
              </form>
            </div>
            </div>
        </div>
    </div>
  </section>
@endsection
@section('script')
<script type="text/javascript">
    $(function() {
        nav_highlight("post-main", "post", "post-add");

    });
  </script>
@endsection