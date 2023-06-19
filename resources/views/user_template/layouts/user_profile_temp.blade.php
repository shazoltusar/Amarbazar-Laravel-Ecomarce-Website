@extends('user_template.layouts.template')
@section('main-content')
<h1> Welcome To {{ Auth::user()->name }}</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="box_main">
                    <ul>
                        <li><a href="{{route('userprofile')}}">Dashboard</a></li>
                        <li><a href="{{route('pendingorders')}}">Pending Order</a></li>
                        <li><a href="{{route('history')}}">History</a></li>
                        <li><a href="">Logout</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box_main">
                    @yield('profilecontent')
                </div>
            </div>
        </div>
    </div>
@endsection
