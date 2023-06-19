@extends('user_template.layouts.template')
@section('main-content')
    <h1> Final Step To Place Your Order.</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="box_main">
                <h3>Product with send At-</h3>
                <p>Name- {{ $shipping_add->name }}</p>
                <p>Phone Number- {{ $shipping_add->phone_number }}</p>
                <p>Your Village- {{ $shipping_add->city_name }}</p>
                <p>Postal Code- {{ $shipping_add->postal_code }}</p>
                <p>Address Details- {{ $shipping_add->add_details }}</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="box_main">
                <h3>Your Final Product Are-</h3>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($card_items as $item)
                                @php
                                    $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                                    $image = App\Models\Product::where('id', $item->product_id)->value('product_img');
                                @endphp
                                <tr>
                                    <th><img src="{{ asset($image) }}" alt="" style="height: 50px;"></th>
                                    <th>{{ $product_name }}</th>
                                    <th>{{ $item->quantity }}</th>
                                    <th>{{ $item->price }}</th>
                                </tr>
                                @php
                                    $total = $total + $item->price;
                                @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>

                                <th></th>
                                <th>Total Price</th>
                                <th></th>
                                <th>{{ $total }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <form action="{{route('placeorder')}}" method="POST">
            @csrf
            <input type="submit" value="Place Order" class="btn btn-success mr-4">
        </form>
        <form action="" method="POST">
            @csrf
            <input type="submit" value="Calcel Order" class="btn btn-danger">
        </form>
    </div>
@endsection
