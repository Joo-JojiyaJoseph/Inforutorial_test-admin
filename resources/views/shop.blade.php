@extends('layouts.app')
@section('content')

  <!-- Inner Banner Section -->
  <section class="inner-banner">
    <div class="image-layer" style="background-image: url({{ asset('/storage/images/background/banner-image-2.jpg') }});"></div>
    <div class="auto-container">
        <div class="inner">
            <div class="subtitle"><span>delicious & amazing</span></div>
            <div class="pattern-image"><img src="{{ asset('/storage/images/icons/separator.svg') }}" alt="" title=""></div>
            <h1><span>Our Menu</span></h1>
        </div>
    </div>
</section>
<!--End Banner Section -->
    <!--Special Offer Section-->
    <section class="special-offer-two">
        <div class="left-bg"><img src="{{ asset('/storage/images/background/bg-20.png') }}" alt="" title=""></div>
        <div class="right-bg"><img src="{{ asset('/storage/images/background/bg-19.png') }}" alt="" title=""></div>
        <div class="auto-container">
            <div class="title-box centered">
                <div class="subtitle"><span>special offer</span></div>
                <div class="pattern-image"><img src="{{ asset('/storage/images/icons/separator.svg') }}"  alt="" title=""></div>
                <h2>Best Special Menu</h2>
            </div>
            <div class="row clearfix">
                @foreach ($cats as $cat)
                    <!--Item-->
                    <div class="offer-block-three col-xl-3 col-lg-4 col-md-6 col-sm-12">
                        <div class="inner-box wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="0ms">
                            <div class="image"><a href="{{route('dish',$cat->id)}}"><img style="height: 300px" src="{{ asset('/storage/uploads/cats/' . $cat->image) }}"
                                        alt=""></a></div>
                            <h4><a href="{{route('dish',$cat->id)}}">{{$cat->title}}</a></h4>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>

    @include('components.tablebooking')
@endsection
