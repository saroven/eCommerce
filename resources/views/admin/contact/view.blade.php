@extends('admin.layout.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inbox</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">Inbox</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    @include('admin.layout.include.error_and_success')

    <!-- Main content -->
    <section class="content">
      <div class="row">
        
        <!-- /.col -->
        <div class="col-md-12">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Inbox</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  @foreach ($contacts as $contact)
                  <tr>
                    <td class="mailbox-name"><a href="{{route('contacts.show', $contact->id)}}">{{$contact->name}}</a></td>
                    <td class="mailbox-subject"><b>{{$contact->subject}}</b> - {{str_limit($contact->message, 40)}}
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">{{Carbon\Carbon::parse($contact->created_at)->diffForHumans()}}</td>
                    <td>
                       <form action="{{route('contacts.destroy', $contact->id)}}" method="POST" style="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
                    </td>
                  </tr>
                  @endforeach

                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                
                <div class="float-right">
                  {{$contacts->links()}}
                  <!-- /.btn-group -->
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
@endsection
@section('script')
<script type="text/javascript">
    $(function() {
        nav_highlight("contact", "contact", "contact");

    });

  </script>
@endsection