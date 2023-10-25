@extends('layouts.app')
@section('content')


  <!-- Inner Banner Section -->
  <section class="inner-banner">
    <div class="image-layer" style="background-image: url({{ asset('/storage/images/background/banner-image-5.jpg') }});"></div>
    <div class="auto-container">
        <div class="inner">
            <div class="subtitle"><span>our team</span></div>
            <div class="pattern-image"><img src="{{ asset('/storage/images/icons/separator.svg') }}" alt="" title=""></div>
            <h1><span>Meet Our Chef</span></h1>
        </div>
    </div>
</section>
<!--End Banner Section -->



@endsection
