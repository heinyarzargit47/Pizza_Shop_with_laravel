@extends('admin.layout.app')

@section('content')
 <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-12  mt-5">

              <div class="card">

                <div class="card-body table-responsive p-0">

                    <table class="table table-hover text-nowrap text-center">
                     <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Category Name</th>
                            <th>Price</th>
                            <th>Discount Price</th>
                            <th>Publish Status</th>
                            <th>By 1 Get 1</th>
                            <th>Waiting Time</th>
                            <th>Description</th>

                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($detailPizza as $datas)
                        <tr>
                            <td>{{ $datas->pizza_id}}</td>
                            <td>{{ $datas->pizza_name}}</td>
                            <td>
                                <img src="{{ asset('images/'.$datas->image)}}" class="img-thumbnail" width="100px">
                            </td>
                            <td>{{$categoryName->category_name}}</td>
                            <td>{{ $datas->price}}&nbsp;Ks</td>
                            <td>{{ $datas->discount_price}}&nbsp;Ks</td>
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
                            <td>{{ $datas->waiting_time}}&nbsp;minutes</td>
                            <td>{{ $datas->description}}</td>




                        </tr>
                        @endforeach

                     </tbody>

                    </table>
                    <div class="my-3 mx-1 float-left" >
                        <a href="{{ route('admin#showPizza')}}" class="text-decoration-none" title="Back"><button class="btn bg-blue text-white" style="width: 100px;"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                        </svg></button>
                        </a>
                    </div>
                  </div>
              </div>

          </div>
        </div>
      </div>
    </section>
  </div>

@endsection

