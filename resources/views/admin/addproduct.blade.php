@extends('admin.layouts.template')
@section('page_title')
    Add Product - Amar Bazar
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Page/</span> Add Product</h4>
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
                    <form action="{{route('storeproduct')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Product
                                Name</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                        placeholder=" Please Enter Product Name" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Product
                                Price</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="number" class="form-control" id="price" name="price"
                                        placeholder=" Please Enter Product Price" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Product
                                Quantity</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="number" class="form-control" id="quantity" name="quantity"
                                        placeholder=" Please Enter Product Quantity" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Product
                                Short Discription</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <textarea class="from-control" name="product_short_des" id="product_short_des" cols="100" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Product
                                Long Discription</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <textarea class="from-control" name="product_long_des" id="product_long_des" cols="100" rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Select Category
                            </label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <select class="form-select" id="product_category_id" name="product_category_id"
                                        aria-label="Default select example">
                                        <option selected>Select Product Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->categori_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Select Sub Category
                            </label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <select class="form-select" id="product_subcategory_id" name="product_subcategory_id"
                                        aria-label="Default select example">
                                        <option selected>Select Sub Category</option>
                                        @foreach ($subcategories as $subcat)
                                            <option value="{{ $subcat->id }}">{{ $subcat->subcategory_name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Upload Product
                                Image</label>
                            <div class="col-sm-10">
                                <input type="file" name="product_img" id="product_img" class="form-control" id="forFile">
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
