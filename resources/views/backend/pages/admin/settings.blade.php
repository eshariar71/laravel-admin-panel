@extends('backend.layout.master')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Admin Settings</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Password</h3>
              </div>
              <!-- /.card-header -->
              <span style="margin-top:15px;">
              @include('backend.partials.message')
              </span>
              <!-- form start -->
              <form role="form" method="post" action="{{ route('updatePass') }}" name="updatePassword" id="updatePasswordForm">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="email1">Admin Name</label>
                    <input  class="form-control" value="{{ $admin->name }}" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="email1">Admin Email</label>
                    <input  class="form-control" value="{{ $admin->email }}" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="email1">Admin Type</label>
                    <input  class="form-control" value="{{ $admin->type }}" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="cur_pass">Current Password</label>
                    <input type="password" class="form-control" id="cur_pass" name="current_pwd" placeholder="Enter your current Password">
                    <span id="cur_pass_id"></span>
                  </div>
                  <div class="form-group">
                    <label for="new_pass">New Password</label>
                    <input type="password" class="form-control" id="npass" name="npass" placeholder="Enter new Password">
                  </div>
                  <div class="form-group">
                    <label for="con_pass">Confirm Password</label>
                    <input type="password" class="form-control" id="conpass" name="conpass" placeholder="Enter confirm Password">
                    <span id="con_pass_id"></span>
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary btn-md">Update</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
