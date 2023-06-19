@extends('user_template.layouts.user_profile_temp')
@section('profilecontent')
    <h1>This Is Pending Order page</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Product Id</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pending_order as $order)
                    <tr>
                        <th>{{ $order->product_id }}</th>
                        <th>{{ $order->total_price }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
