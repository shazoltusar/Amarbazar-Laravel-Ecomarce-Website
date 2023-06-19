@extends('admin.layouts.template')
@section('page_title')
    Edit Catagory-Amar Bazar
@endsection
@section('content')
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Page/</span> Edit Category</h4>
        <!-- Basic with Icons -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Edit Category</h5>
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
                    <form action="{{route('updatecategory')}}" method="POST">
                        @csrf
                        <input type="hidden" name="category_id" value="{{$category_info->id}}">
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Category Name</label>
                            <div class="col-sm-10">
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-fullname2" class="input-group-text"><i
                                            class="bx bx-user"></i></span>
                                    <input type="text" class="form-control" id="categori_name" value="{{$category_info->categori_name}}" name="categori_name"/>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Update Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
