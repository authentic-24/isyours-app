@extends('layouts.app_home')

@section('content')
<br>
<br>
<br>
    <section class="page-title">
        <div class="auto-container">
            <div class="title-outer">
                <h1>Sitemap</h1>
            </div>
        </div>
    </section>
    <div style="left: 30%; margin: 100px 0 0 200px;"
        class="list-style-two justify-content-center col-lg-4 col-md-6 col-sm-12">
        <ul class="list-style-two">
            <li class="list-style-two"><a href="#">Home</a></li>
            <li class="list-style-two"><a href="#">About Us</a></li>
            <li class="list-style-two"><a href="#">Register</a></li>

{{-- <li class="list-style-two"><a href="{{ route('home') }}">Home</a></li>
            <li class="list-style-two"><a href="{{ route('about') }}">About Us</a></li>
            <li class="list-style-two"><a href="{{ route('web_register') }}">Register</a></li> --}}

        </ul>
    </div>
@endsection
