@extends('user_template.layouts.template')
@section('main-content')
    <h1> This Is Add To Card Page</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-12">
            <div class="box-main">
                <div class="table-responsive">
                        <table class="table">
                        <thead>
                          <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>quantity</th>
                            <th>Price</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php
                                $total = 0;
                            @endphp
                            @foreach ($card_item as $item)
                                @php
                                    $product_name = App\Models\Product::where('id', $item->product_id)->value('product_name');
                                    $image = App\Models\Product::where('id', $item->product_id)->value('product_img');
                                @endphp
                            <tr>
                                <th><img src="{{ asset($image) }}" alt="" style="height: 50px;"></th>
                                <th>{{$product_name}}</th>
                                <th>{{$item->quantity}}</th>
                                <th>{{$item->price}} Tk</th>
                                <th><a href="{{route('deletecard', $item->id)}}" class="btn btn-warning">Remove</a></th>
                            </tr>
                            @php
                                $total = $total + $item->price;
                            @endphp
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                
                                <th></th>
                                <th></th>
                                <th>Total Price</th>
                                <th>{{$total}} Tk</th>
                                @if ($total = 0)
                                <th><a href="" class="btn btn-success disabled">Checkout Now</a></th>
                                @else
                                <th><a href="{{route('shippingaddress')}}" class="btn btn-success">Checkout Now</a></th>
                                @endif
                            </tr>
                        </tfoot>
                      </table>
                      </div>
            </div>
        </div>
    </div>
@endsection
