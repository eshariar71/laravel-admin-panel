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
                <h3 class="card-title">Admin Update Details</h3>
              </div>
              <!-- /.card-header -->
              <span style="margin-top:15px;">
              @include('backend.partials.message')
              </span>
              <!-- form start -->
              <form role="form" method="post" action="{{ route('updateDetails') }}" name="updateDetails" id="updateDetailsForm" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Email</label>
                    <input  class="form-control" value="{{ $admin->email }}" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Admin Type</label>
                    <input  class="form-control" value="{{ $admin->type }}" readonly="">
                  </div>
                  <div class="form-group">
                    <label for="name">Admin Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $admin->name }}">
                    <span id="cur_pass_id"></span>
                  </div>
                  <div class="form-group">
                    <label for="mobile">Admin Mobile </label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{ $admin->mobile }}" min="11" max="13">
                  </div>
                  <div class="form-group">
                    <label for="image">Admin Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                        <label class="custom-file-label" for="image">Choose file</label>
                        @if(!empty($admin->image))
                          <input type="hidden" name="curr_image" value="{{ $admin->image }}">
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="form-group img" >
                    <img src="{{ url('images/'.$admin->image ) }}" style="width:120px; height:120px" alt="Admin photo">
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
