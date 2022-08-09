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
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <a href="{{ route('admin#addCategory')}}">
                  <button class="btn btn-sm btn-outline-dark">Add Category</button>
                </a>
                </h3>

                <div class="card-tools">
                  <form action="{{ route('admin#searchCategory')}}" method="post">
                    @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                        @if(Session::has('oldData'))

                        <input type="text" name="searchCategory" class="form-control float-right" value="{{old('searchCategory',Session::get('oldData'))}}" placeholder="Search">
                        @else
                        <input type="text" name="searchCategory" class="form-control float-right"  placeholder="Search">


                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                        @endif
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
                        <th>Product Count</th>
                        <th>Action</th>
                    </tr>
                 </thead>
                 <tbody>
                    @foreach ($categoryData as $items)



                    <tr>
                        <td>{{$items->category_id}}</td>
                        <td>{{$items->category_name}}</td>
                        <td>
                            @if ($items->count == 0)
                            <a href="#">{{ $items->count}}</a></td>
                            @else
                            <a href="{{ route('admin#categoryItem',$items->category_id)}}">{{ $items->count}}</a></td>
                            @endif

                        <td>
                            <a href=" {{ route('admin#editCategory',$items->category_id)}} " class="text-decoration-none">
                                <button class="btn btn-sm bg-blue text-white" title="Update"><i class="fas fa-eye"></i></button>
                            </a>&nbsp;
                            <a href="{{ route('admin#deleteCategory',$items->category_id)}}" class="text-decoration-none">
                                <button class="btn btn-sm bg-danger text-white" title="Delete"><i class="fas fa-trash"></i></button>
                            </a>

                        </td>
                    </tr>
                    @endforeach
                 </tbody>
                </table>
                <div class="mt-4 text-center">{{$categoryData->links()}}</div>
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
