@extends('admin.layout.app')

@section('content')
 <div class="content-wrapper">
    <section class="content">
    <div class="container-fluid">
        <div class="row mt-4">
        <div class="col-9 offset-3 mt-5">
        <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                  <legend class="text-center">Add New Pizza</legend>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">

                      <form class="form-horizontal" method="POST" action="{{ route('admin#addPizza')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name')}}"  placeholder="Name">
                            @if($errors->has('name'))
                            <small class="text-danger">{{ $errors->first('name')}}</small>
                            @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputImage" class="col-sm-3 col-form-label">Image</label>
                            <div class="col-sm-9">
                              <input type="file" class="form-control" id="inputImage" name="image"   placeholder="Choose Photo">
                              @if($errors->has('image'))
                              <small class="text-danger">{{ $errors->first('image')}}</small>
                              @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputprice" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" id="inputPrice" name="price" value="{{old('price')}}" placeholder="Input Price">
                              @if($errors->has('price'))
                              <small class="text-danger">{{ $errors->first('price')}}</small>
                              @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPublishstatus" class="col-sm-3 col-form-label">Public Status</label>
                            <div class="col-sm-9">
                              <input type="radio" name="publishStatus" checked value="1" id="">&nbsp;Public&nbsp;&nbsp;
                              <input type="radio" name="publishStatus" value="0" id="">&nbsp;Unpublic

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputprice" class="col-sm-3 col-form-label">Discount Price</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" id="inputPrice" name="discountPrice" value="{{ old('discountPrice')}}"  placeholder="0 Ks">
                              @if($errors->has('discountPrice'))
                              <small class="text-danger">{{ $errors->first('discountPrice')}}</small>
                              @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPublishstatus" class="col-sm-3 col-form-label">By One Get One</label>
                            <div class="col-sm-9">
                              <input type="radio" name="byOneGetOne"  value="1" id="">&nbsp;On&nbsp;&nbsp;
                              <input type="radio" name="byOneGetOne" checked value="0" id="">&nbsp;Off

                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputprice" class="col-sm-3 col-form-label">Waiting Time</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputTime" name="waitingTime" value="{{ old('waitingTime')}}"  placeholder="Input Time">
                              @if($errors->has('waitingTime'))
                              <small class="text-danger">{{ $errors->first('waitingTime')}}</small>
                              @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputprice" class="col-sm-3 col-form-label">Description</label>
                            <div class="col-sm-9">
                              <textarea name="description"  id="" cols="40" rows="2" placeholder="Description" class="form-control">{{ old('description')}}</textarea>
                              @if($errors->has('description'))
                              <small class="text-danger">{{ $errors->first('description')}}</small>
                              @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputprice" class="col-sm-3 col-form-label">Category Name</label>
                            <div class="col-sm-9">
                              <select name="categoryName" class="form-control" >
                                <option value="">Choose Category</option>
                                @foreach ($category_names as $categories )
                                <option value="{{$categories->category_id}}">{{ $categories->category_name}}</option>

                                @endforeach

                              </select>
                              @if($errors->has('categoryName'))
                              <small class="text-danger">{{ $errors->first('categoryName')}}</small>
                              @endif
                            </div>
                        </div>



                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <a href="{{ route('admin#showPizza')}}" class="text-decoration-none">
                                <button type="button" class="btn bg-dark text-white"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-left" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8.354 1.646a.5.5 0 0 1 0 .708L2.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                    <path fill-rule="evenodd" d="M12.354 1.646a.5.5 0 0 1 0 .708L6.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                  </svg>Back</button>
                            </a>&nbsp;

                            <button type="submit" class="btn bg-green text-white">Add</button>

                          </div>

                        </div>
                      </form>

                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    </div>


    </section>
  </div>

@endsection

