@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-12">
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('success')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              @if(Session::has('deleteSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('deleteSuccess')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              @if(Session::has('updateSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('updateSuccess')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              @if(Session::has('createSuccess'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('createSuccess')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <a href="{{ route('admin#createPizza')}}">
                  <button class="btn btn-sm btn-outline-dark">Add New</button>
                </a>
                </h3>



                <div class="card-tools">
                  <form action="{{ route('admin#searchPizza')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">

                        <input type="text" name="searchPizza" class="form-control float-right"  placeholder="Search">


                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>
                          </div>

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
                        <th>Image</th>
                        <th>Price</th>
                        <th>Publish Status</th>
                        <th>By 1 Get 1</th>
                        <th>Action</th>
                    </tr>
                 </thead>
                 <tbody>
                    @foreach ($pizzaData as $datas)
                    <tr>
                        <td>{{ $datas->pizza_id}}</td>
                        <td>{{ $datas->pizza_name}}</td>
                         <td>
                            <img src="{{ asset('images/'.$datas->image)}}" class="img-thumbnail" width="100px">
                        </td>

                        <td>{{ $datas->price}}</td>
                        @if($datas->publish_status == 1)
                        <td>Yes</td>
                        @else
                        <td>No</td>
                        @endif
                        @if($datas->by_one_get_one_status == 1)
                        <td>Yes</td>
                        @else
                        <td>No</td>
                        @endif
                        <td>
                            <a href="{{ route('admin#detailPizza',$datas->pizza_id)}}" class="text-decoration-none" title="See More...."> <button class="btn btn-sm bg-blue text-white"><i class="fa fa-eye" aria-hidden="true"></i></button> </a>
                           <a href="{{ route('admin#editPizza',$datas->pizza_id)}}" class="text-decoration-none" title="Edit"> <button class="btn btn-sm bg-yellow text-white"><i class="fas fa-edit"></i></button></a>
                            <a href="{{ route('admin#deletePizza',$datas->pizza_id)}}" class="text-decoration-none" title="Delete"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
                          </td>
                    </tr>
                    @endforeach

                 </tbody>
                </table>
                <div class="mt-4 text-center"></div>
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
