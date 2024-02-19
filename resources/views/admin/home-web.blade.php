@extends('admin.layouts.app')

@section('title', 'Website Management')

@section('content')

    <div class="main-container">

        {{-- <div class="row mb-3">
            <div class="col-md-1">
                <a href="{{ route('dashboard') }}" class="btn btn-primary">Back</a>
            </div>
        </div> --}}

        <div class="row p-5">

            {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Pickup</h3><p>Website order</p></div>
                    </div>
                </a>
            </div> --}}

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('orders') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>New order</h3><p>Website order</p></div>
                    </div>
                </a>
            </div>


            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Table Booking</h3><p>Website Table Booking</p></div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('category.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Category</h3><p>Website category</p></div>
                    </div>
                </a>
            </div>

            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('food.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Food</h3><p>Website food</p></div>
                    </div>
                </a>
            </div>


            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Table</h3><p>Website Table</p></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="row gutters p-5">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('logo.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Logo</h3><p>Website Logo</p></div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('seo.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>SEO</h3><p>Website SEO</p></div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('home.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Home</h3><p>Website Home</p></div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{ route('about.index') }}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>About</h3><p>Website About</p></div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{route('team.index')}}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Our Chef</h3><p>Website Chef</p></div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{route('testimonial.index')}}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>Testimonials</h3><p>Website Testimonials</p></div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                <a href="{{route('news.index')}}">
                    <div class="info-stats2">
                        <div class="info-icon danger"><i class="icon-layers2"></i></div>
                        <div class="sale-num"><h3>News</h3><p>Website News</p></div>
                    </div>
                </a>
            </div>


        </div>
    </div>

@endsection
