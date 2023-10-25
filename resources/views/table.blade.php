@extends('layouts.app')
@section('content')

 <!-- Inner Banner Section -->
 <section class="inner-banner">
    <div class="image-layer" style="background-image: url({{ asset('/storage/images/background/banner-image-3.jpg') }});"></div>
    <div class="auto-container">
        <div class="inner">
            <div class="subtitle"><span>book your table</span></div>
            <div class="pattern-image"><img src="{{ asset('/storage/images/icons/separator.svg') }}" alt="" title=""></div>
            <h1><span>Reservation</span></h1>
        </div>
    </div>
</section>
<!--End Banner Section -->

@include('components.tablebooking')

@endsection
