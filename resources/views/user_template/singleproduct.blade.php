@extends('user_template.layouts.template')
@section('main-content')
    <h1> This Is Single Product Page</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="box_main">
                    <div class="tshirt_img"><img src="{{ asset($product->product_img) }}"></div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box_main">
                    <div class="product_info">
                        <h4 class="shirt_text">{{ $product->product_name }}</h4>
                        <p class="price_text">Price <span style="color: #262626;"> {{ $product->price }} TK</span></p>
                    </div>
                    {{-- {{ $product->product_name }}{{ $product->price }} --}}
                    <div class="my-3 product_details">
                        <p class="lead">{{ $product->product_long_des }}</p>
                        <ul class="p-2 my-2 bg-light">
                            <li>Category - {{ $product->product_category_name }}</li>
                            <li>Subcategory - {{ $product->product_subcategory_name }}</li>
                            <li>Available Quantity - {{ $product->quantity }}</li>
                        </ul>
                    </div>
                    <div class="btn_main">
                        <form action="{{ route('addproductcart') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ $product->id }}" name="product_id">
                            <input type="hidden" value="{{ $product->price }}"name="price">
                            <div class="from-group">
                                <label for="product_quantity">How Many pics?</label>
                                <input class="form-control" type="number" min="1" max="{{ $product->quantity }}"
                                    value="1" name="quantity">
                            </div>
                            <br>
                            <input type="submit" class="btn btn-warning" value="Add To Card">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="fashion_section">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <h1 class="fashion_taital">Related Products</h1>
                            <div class="fashion_section_2">
                                <div class="row">
                                    @foreach ($related_Products as $product)
                                        <div class="col-lg-4 col-sm-4">
                                            <div class="box_main">
                                                <h4 class="shirt_text">{{ $product->product_name }}</h4>
                                                <p class="price_text">Price <span style="color: #262626;">
                                                        {{ $product->price }} TK</span></p>
                                                <div class="tshirt_img"><img src="{{ asset($product->product_img) }}"
                                                        alt="Image Not found"></div>
                                                <div class="btn_main">
                                                    <div class="buy_bt">
                                                        <form action="{{ route('addproductcart') }}"
                                                            method="POST">
                                                            @csrf
                                                            <input type="hidden" value="{{ $product->id }}"name="product_id">
                                                            <input type="hidden" value="{{ $product->price }}"name="price">
                                                            <input type="hidden" value="1"name="quantity">
                                                            <input type="submit" class="btn btn-warning" value="Bye Now">
                                                        </form>
                                                    </div>
                                                    <div class="seemore_bt"><a
                                                            href="{{ route('singleproduct', [$product->id, $product->slug]) }}">See
                                                            More</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
