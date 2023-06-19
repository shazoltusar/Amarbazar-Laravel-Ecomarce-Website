@extends('admin.layouts.template')
@section('page_title')
    All Category - Amar Bazar
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-1 mb-4"><span class="text-muted fw-light">Page/</span> All Category</h4>
        <!-- Bootstrap Table with Header - Light -->
        <div class="card">
            <h5 class="card-header">Available Category Information</h5>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Sub Category</th>
                            <th>Slug</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($catagories as $catagory)
                            <tr>
                                <td>{{ $catagory->id }}</td>
                                <td>{{ $catagory->categori_name }}</td>
                                <td>{{ $catagory->subcategory_count }}</td>
                                <td>{{ $catagory->slug }}</td>
                                <td>
                                    <a href="{{ route('editcategory', $catagory->id) }}" class="btn btn-primary">Edit</a>
                                    <a href="{{ route('deletecategory', $catagory->id) }}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
