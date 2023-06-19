@extends('admin.layouts.template')
@section('page_title')
    Edit Product - Amar Bazar
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Page/</span> Edit Product</h4>
        <!-- Basic with Icons -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Product</h5>
                    <small class="text-muted float-end">Input Infromation</small>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('updateproduct')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="{{$productinfo->id}}" name="id">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Product
                                Name</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                        value="{{$productinfo->product_name}}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Product
                                Price</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="number" class="form-control" id="price" name="price"
                                        value="{{$productinfo->price}}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Product
                                Quantity</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="number" class="form-control" id="quantity" name="quantity"
                                    value="{{$productinfo->quantity}}" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Product
                                Short Discription</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <textarea class="from-control" value="" name="product_short_des" id="product_short_des" cols="100" rows="2">{{$productinfo->product_short_des}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Product
                                Long Discription</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <textarea class="from-control" value="" name="product_long_des" id="product_long_des" cols="100" rows="6">{{$productinfo->product_long_des}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
