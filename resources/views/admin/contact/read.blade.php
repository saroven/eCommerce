@extends('admin.layout.master')
@section('content')
 <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Read</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('contacts.index') }}">contact</a></li>
              <li class="breadcrumb-item active">Read</li>
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
         
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Read Mail</h3>

              <div class="card-tools">
                <a href="{{ route('contacts.index') }}" class="btn btn-primary">All Mails</a>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>{{$contact->subject}}</h5>
                <h6>From: {{$contact->email}}
                  <span class="mailbox-read-time float-right">{{date('jS F Y, H:i A', strtotime($contact->created_at))}}</span></h6>
              </div>
              
              <div class="mailbox-read-message">
                {{$contact->message}}
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <form action="{{route('contacts.destroy', $contact->id)}}" method="POST">
              	@csrf
              	@method('DELETE')
              	<button type="submit" class="btn btn-default"><i class="fas fa-trash-alt"></i> Delete</button>
              </form>
              
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

@endsection