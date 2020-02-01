@extends('admin.layout.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><b style="text-transform: capitalize;">{{$user->name}}'s</b> Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @include('admin.layout.include.error_and_success')

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="@if (empty($user->image))
                       	{{ asset($user->image) }}
                       	@else
                       	{{ asset('img/avater/avater.png') }}
                       @endif"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$user->name}}</h3>

                <p class="text-muted text-center">{{$user->role->title}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Posts</b> <a class="float-right">{{$posts->count()}}</a>
                  </li>
                </ul>

                @if (auth()->id() !== $user->id)
                	<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                @endif
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Education</strong>

                <p class="text-muted">
                  {{$user->education}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                <p class="text-muted">{{$user->location}}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                <p class="text-muted">
                  <span class="text-muted">{{$user->skills}}</span>
                  
                </p>

                <hr>

                <strong><i class="fas fa-quote-right"></i></i> About</strong>

                <p class="text-muted">{{$user->about}}.</p>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Posts</a></li>
                  @if(auth()->id() == $user->id)
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                  <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Password</a></li>
                  @endif
                </ul>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="timeline">
                    <!-- Post -->
                    <div class="post">
                      @if (!$posts->isEmpty())
                      	@foreach ($posts as $post)
                      	<a href="{{ route('post.view', $post->id) }}">{{$post->title}}</a>
	                      <p class="mt-2">
	                        <a href="#" class="link-black text-sm mr-2"><i class="fas fa-share mr-1"></i> Share</a>
	                        <a href="#" class="link-black text-sm"><i class="fas fa-thumbs-up mr-1"></i></i> Like</a>
	                        <span class="float-right">
	                          <a href="#" class="link-black text-sm">
	                            <i class="fas fa-comments mr-1"></i> {{$post->comment}}
	                          </a>
	                        </span>
	                      </p>
                       @endforeach
                       {{$posts->links()}}
                       @else
                       <p>No Posts Available</p>
                      @endif
                   </div>
                    <!-- /.post -->

                  </div>

                @if(auth()->id() == $user->id)
                {{-- tab  --}}
                  <div class="tab-pane" id="settings">
                  	{!! Form::open(array('class'=>'form-horizontal', 'url'=>route('updateuser',auth()->id()))) !!}
                      <div class="form-group">
                        <label for="Name" class="col-sm-2 control-label">Name</label>

                        <div class="col-sm-10">
                        	{!! Form::text('name', $user->name, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Email" class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                        	{!! Form::text('email', $user->email, ['class'=>'form-control', 'placeholder'=>'Email']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="education" class="col-sm-2 control-label">Education</label>

                        <div class="col-sm-10">
                        	{!! Form::text('education', $user->education, ['class'=>'form-control', 'placeholder'=>'Education']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Location" class="col-sm-2 control-label">Location</label>

                        <div class="col-sm-10">
                        	{!! Form::text('location', $user->location, ['class'=>'form-control', 'placeholder'=>'Location']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="Skills" class="col-sm-2 control-label">Skills</label>

                        <div class="col-sm-10">
                        	{!! Form::text('skills', $user->skills, ['class'=>'form-control', 'placeholder'=>'Skills']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="About" class="col-sm-2 control-label">About</label>

                        <div class="col-sm-10">
                        	{!! Form::textarea('about', $user->about, ['class'=>'form-control', 'placeholder'=>'About', 'style'=>'height:150px']) !!}
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <div class="tab-pane" id="password">
                    <form class="form-horizontal" action="{{ route('profile.update', auth()->id()) }}" method="post">
                      @csrf
                      @method('PUT')
                      <div class="form-group">

                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="current_password" placeholder="Current Password" name="current_password" required>
                        </div>
                      </div>
                      <div class="form-group">

                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password" placeholder="New Password" name="password">
                        </div>
                      </div>
                      <div class="form-group">

                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="confirm-password" placeholder="Re-type Password" name="confirm_password">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>

                @endif

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
 