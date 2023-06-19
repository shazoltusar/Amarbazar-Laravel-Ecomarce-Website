@extends('admin.layouts.template')
@section('page_title')
    Edit Product Image - Amar Bazar
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Page/</span> Edit Product Image</h4>
        <!-- Basic with Icons -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Product</h5>
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
                    <form action="{{route('updateproductimge')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{$productimginfo->id}}" id="">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">privious
                                Image</label>
                                <div class="col-sm-10">
                                <img style="width: 120px;" src="{{ asset($productimginfo->product_img) }}" alt="">
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Upload New
                                Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="product_img" id="product_img" class="form-control" id="forFile">
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Product Image</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
