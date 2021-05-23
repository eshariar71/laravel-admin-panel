@extends('backend.layout.master')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active"><a href="{{ route('menu.create') }}" >Add Menu</a></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">

			<div class="card">
            <div class="card-header">
              <h3 class="card-Name">Menu DataTable</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

            	<div style="width:60%; margin:0 auto;">
                     @include('backend.partials.message')
                </div>

              <table id="dtable" class="table table-bordered table-striped">
                <thead>
                <tr>
                	<th>Sl</th>
                  <th>Menu Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i=1;
                  @endphp
                  @foreach ($results as $val)
                <tr>
                	<td>{{ $i }}</td>
                  <td>{{ $val->name }}</td>
                  <td>
                      @if ($val->status == 1)
                        <span class="btn btn-success" >Active</span>
                      @else
                        <span class="btn btn-warning" >Inactive </span>
                      @endif
                  </td>
					<td><span><a href="{{ route('menu.edit', $val->id) }}" data-toggle="tooltip" data-placement="top" Name="Edit" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i> </a>
                        <a href="#deleteModal{{ $val->id }}" data-toggle="modal" data-placement="top" Name="Close" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a></span>

                      <!-- Modal -->
                      <div class="modal fade" id="deleteModal{{ $val->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-Name text-center" id="exampleModalLabel">Are you sure to delete?</h5>
                              <button Status="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-footer">
                              <form  action="{{ route('menu.delete', $val->id) }} }}" method="post">
                                @csrf
                                  <button Status="submit" class="btn btn-danger" >Ok</button>
                              </form>
                              <button Status="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- Modal End -->
                    </td>
                </tr>
                @php
                  $i++;
                @endphp
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Sl</th>
                  <th>Menu Name</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </section>
</div>
@endsection
