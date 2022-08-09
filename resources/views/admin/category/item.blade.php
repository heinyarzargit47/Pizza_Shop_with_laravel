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





                    <h2 class="text-center">
                      <span class="text-muted"> Category_Type - </span> {{ $categoryItem[0]->category_name }}
                    </h2>

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
                    </tr>
                 </thead>
                 <tbody>
                    @foreach ($categoryItem as $datas)
                    <tr>
                        <td>{{ $datas->pizza_id}}</td>
                        <td>{{ $datas->pizza_name}}</td>
                         <td>
                            <img src="{{ asset('images/'.$datas->image)}}" class="img-thumbnail" width="100px">
                        </td>

                        <td>{{ $datas->price}}</td>
                    </tr>
                    @endforeach
                 </tbody>

                </table>
<div class="my-3 ml-3">
    <a href="{{ route('admin#category')}}" ><button class="px-3 py-1" title="Back"><i class="fa fa-angle-double-left"></i> Back</button></a>
</div>
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
