@extends('admin.layouts.template')
@section('page_title')
    Add Sub Category - Amar Bazar
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Page/</span> Add Sub Category</h4>
        <!-- Basic with Icons -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add New Sub Category</h5>
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
                    <form action="{{route('storsubcategory')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Sub Category
                                Name</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <input type="text" class="form-control" id="subcategory_name" name="subcategory_name"
                                        placeholder=" Please Enter Sub Category Name" />
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Select Category
                            </label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <select class="form-select" id="category_id" name="category_id" aria-label="Default select example">
                                        <option selected>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->categori_name}}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Sub Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
