@extends('admin.layout.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">All post</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">posts</li>
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
                <h3 class="card-title">All posts Informations</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Author</th>
                      <th>Title</th>
                      <th>Body</th>
                      <th>Category </th>
                      <th>Tags</th>
                      <th>Slug</th>
                      <th>Thumbnail</th>
                      <th>Created</th>
                      <th>Updated</th>
                      <th>Action</th>
                    </tr>
                  </thead>

                  <tbody>
                    @foreach($posts as $post)
                    <tr>
                      <td>{{$post->user->name}} </td>
                      <td>{{$post->post_title}} </td>
                      <td>{{str_limit($post->post_body, 200)}} </td>
                      <td>{{$post->category1->title}} </td>
                      <td>{{$post->post_tags}} </td>
                      <td>{{$post->post_slug}} </td>
                    <td><img style="height:100px;weight:auto;" src="{{asset('img').'/'.$post->post_thumbnail}}" alt="{{config('app.name')}}"> </td>
                      <td>{{$post->created_at}}</td>
                      <td>{{$post->updatd_at}}</td>
                      <td>
                      <a href="{{route('post.show',$post->id)}}" class="btn btn-info">View</a>
                      <a href="{{route('post.edit', $post->id)}}" class="btn btn-warning">Edit</a>
                      <form action="{{route('post.destroy', $post->id)}}" method="POST">
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
            	{{$posts->links()}} 
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
        nav_highlight("post-main", "post", "post-all");

    });
  </script>
@endsection