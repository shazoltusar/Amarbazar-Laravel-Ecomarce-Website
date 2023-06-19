@extends('user_template.layouts.template')
@section('main-content')
<h1>Provite Your Shipping Information</h1>
<div class="row">
    <div class="col-12">
        <div class="box-main">
            <form action="{{route('addshippingaddress')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" placeholder="Your Name" class="form-control" required name="name">
                
                    <label for="phone_number">Phone Number</label>
                    <input type="text" placeholder="Your Phone Number" class="form-control" required name="phone_number">
         
                    <label for="city_name">Village / City</label>
                    <input type="text" placeholder="Your Village or City Aria" class="form-control" required name="city_name">

                    <label for="postal_code">Postal Code</label>
                    <input type="text" placeholder="Your Postal Code" class="form-control" required name="postal_code">

                    <label for="add_details">Address Details</label>
                    <input type="text" placeholder=" Please Text Your Address Details" required class="form-control" name="add_details">
                </div>
                <input type="submit" value="Next" class="btn btn-primary"> 
            </form>
        </div>
    </div>
</div>
@endsection