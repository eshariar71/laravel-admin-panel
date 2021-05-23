@extends('backend.layout.master')
@section('content')
   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Menu</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('menu.all') }}">Menu</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Menu <small>Input Form</small></h3>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" id="quickForm" action="{{ route('menu.update', $val->id ) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="name">Menu Name<span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $val->name }}">
                  </div>
                  <div class="form-group">
                    <label for="name">Sub Menu Name<span class="text-danger">*</span>
                    </label>
                    <select class="form-control" id="parent_id" name="parent_id" required>
                      @if ($val->parent_id ===  $val->id)
                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                      @else
                        <option value="0">Select One</option>
                      @endif
                      @foreach ($menus as $val)
                        <option  value="{{ $val->id }}" >{{ $val->name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                     <label for="cat_type">Status <span class="text-danger">*</span></label>
                       <select class="form-control" id="cat_type" name="status">

                         <option  value="1" @if($val->status == 1) selected="selected"  color:green  @else ' ' @endif>Active</option>
                         <option  value="0" @if($val->status == 0) selected="selected" color:red  @else ' ' @endif>Inactive</option>

                       </select>
                   </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <a href="{{ route('menu.all') }}" class="btn btn-danger">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection
