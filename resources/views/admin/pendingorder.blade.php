@extends('admin.layouts.template')
@section('page_title')
Pending Order - Amar Bazar
@endsection
@section('content')
<style>
    .content-wrapper{display:block};
</style>
<h1 class="text-center">Pending Order</h1>
<div class="container">
    <div class="card">
        <div class="card-title">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Shiping Info</th>
                                <th>Product Id</th>
                                <th>Quantity</th>
                                <th>Total Pay</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pending_order as $order)
                                <tr>
                                    {{-- <th>{{ $order->product_id }}</th> --}}
                                    <th>{{ $order->user_id }}</th>
                                    <th>{{ $order->shipping_name }}</th>
                                    <th>
                                        <ul>
                                            <li>City- {{ $order->shipping_city }}</li>
                                            <li>Phone- {{ $order->shipping_phone }}</li>
                                            <li>Post- {{ $order->shipping_postalcod}}</li>
                                            <li>Address- {{ $order->shipping_address }}</li>
                                        </ul>
                                    </th>
                                    <th>{{ $order->product_id }}</th>
                                    <th>{{ $order->quantity }}</th>
                                    <th>{{ $order->total_price }}</th>
                                    <th>{{ $order->status }}</th>
                                    <th><a href="" class="btn btn-success">Approve</a></th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection