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


@include('components.chef')


    <!--quote Section-->
    <section class="intro-section quote">
        <div class="image-layer" style="background-image: url({{ asset('/storage/images/background/image-12.jpg') }});"></div>
        <div class="auto-container">
            <div class="content-box">
                <h3>A modern restaurant with a menu that will make your mouth water.</h3>
                <div class="separator"><span></span><span></span><span></span></div>
                {{-- <div class="auth-title">Henry - Master chef</div> --}}
            </div>

        </div>
    </section>


@endsection
