@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-12">


              @if(Session::has('deleteSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('deleteSuccess')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <a href="{{ route('admin#adminList') }}">
                  <button class="btn btn-sm btn-outline-dark">Admin List</button>
                </a>
                <a href="{{ route('admin#userList')}}" class="ml-2">
                    <button class="btn btn-sm btn-outline-dark">User List</button>
                  </a>
                </h3>

                <div class="card-tools">
                  <form action="{{ route('admin#adminSearch')}}" method="post">
                    @csrf
                    <div class="input-group input-group-sm my-auto" style="width: 150px;">
                        {{-- @if(Session::has('oldData')) --}}

                        <input type="text" name="searchAdmin" class="form-control float-right" value="" placeholder="Search">



                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                        {{-- @endif --}}
                      </div>
                </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">

                <table class="table table-hover text-nowrap text-center">
                 <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>

                    </tr>
                 </thead>
                 <tbody>
                    @if(count($adminData) != 0)

                    @foreach ($adminData as $items)


                    <tr>
                        <td>{{ $items->id }}</td>
                        <td>{{ $items->name }}</td>
                        <td>{{ $items->email }}</td>
                        <td>{{ $items->address }}</td>
                        <td>

                            <a href="{{ route('admin#deleteAdmin',$items->id)}}" class="text-decoration-none">
                                <input type="submit" value="Delete" class="btn btn-danger">
                            </a>

                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="5" class="text-muted">Nothing to show !</td>
                    </tr>
                    @endif


                 </tbody>

                </table>
                <div class="mt-4 text-center">{{$adminData->links()}}</div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
