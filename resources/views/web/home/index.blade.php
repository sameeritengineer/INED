@extends('web.layouts.index')
@section('title','INEDSYS')
@section('content')
<div class="col-md-12 col-sm-12 col-xs-12 top-banner" id="banner">
    <div class="swiper-container">
        <div class="swiper-wrapper">
	       <div class="swiper-slide">
                <img src="{{asset('web/images/main-banner.jpg')}}" alt="" class="img-responsive bannner-img hidden-xs" />
                <img src="{{asset('web/images/mob-banner.jpg')}}" alt="" class="img-responsive bannner-img visible-xs" />
               <div class="banner-cont text-center">
                   <h3 class="">Our Mission is to Create <br> a World Class Medical E-library for Anyone Anywhere</h3>
                   <strong><a class="know-more-btn" href="{{route('web.ined-library')}}"><i class="fa fa-play-circle-o video_icon"></i> INED LIBRARY</a> </strong>
               </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 about_section">
    <div class="container">
        <div class="section-title-row">
            <h3 class="section-title">ABOUT US</h3>
        </div>
        <div class="col-md-6 about_img">
            <img class="img-responsive" src="{{asset('web/images/about_us_home.jpg')}}" alt="aboutus">
            </img>
        </div>
        <div class="col-md-6 about_cont">
            We strive to bring together the best medical content from major publishers and medical leaders in their specialty, faculty from top training programs to create a large up-to-date training library for healthcare practitioners using fast, easy, effective online learning tools.
			<a class="read_more_text padding-top-10" href="{{route('web.about-us')}}">Read More</a>
        </div>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 about_section">
    <div class="container">
        <div class="row">
            <div class="section-title-row col-md-12 col-sm-12 col-xs-12">
                <h3 class="section-title">INED LIBRARY</h3>
               <!-- <p class="title-p-des">International Medical Education</p> -->
            </div>
            @foreach($categories as $cat)
            <a href="{{route('web.ined-library-detail', ['categorySlug'=>$cat->slug])}}">
            <div class="col-md-4 col-sm-4 col-xs-12 three_row_section">
                <img src="{{asset('admin/upload/category/'.$cat->image)}}" alt="{{$cat->alt}}" class="img-responsive" />
                <div class="img_split">{{$cat->name}}</div>
            </div>
            </a>
            @endforeach
        </div>
       <!-- <div class="view-all-btn"><a class="view-all" href="">View All</a></div> -->
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 editorial_board">
    <div class="section-title-row col-md-12 col-sm-12 col-xs-12">
        <h3 class="section-title text-white">EDITORIAL BOARD</h3>
        <p class="title-p-des text-white">International Medical Education</p>
    </div>
    <div id="testimonial" class="col-md-12 col-sm-12 col-xs-12">
        <div class="swiper-container">
            <div class="swiper-wrapper">
            @foreach($boards as $board)
                <div class="swiper-slide slider-row">
                    <div class="slider-img-testimonial">
                        <img src="{{asset('admin/upload/board/'.$board->image)}}" class="img-responsive img-circle" alt="{{$board->alt}}" />
                    </div>
                    <div class="testimonial_content">
                        <h3>{{$board->name}}</h3>
                        <p class="testimonial_p_profile"><b>{{$board->designation}}</b></p>
                        <p>{{ $board->s_description }}</p>
                        <a class="read_more_text" href="{{route('web.all-editorial', $board->slug)}}">Read More</a>
                        </p>
                    </div>
                </div>
            @endforeach

            </div>
<!--             <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div> -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 about_section">
    <div class="container">
        <div class="row">
            <div class="section-title-row col-md-12 col-sm-12 col-xs-12">
                <h3 class="section-title">NEWS &AMP; EVENTS</h3>
                <p class="title-p-des">International Medical Education</p>
            </div>
            @foreach($news as $value)
            <div class="col-md-4 col-sm-4 col-xs-12 three_row_section">
                <a href="{{$value->url}}" target="_blank"><img src="{{asset('admin/upload/news/'.$value->image)}}" alt="{{$value->alt}}" class="img-responsive" />
                <h3 class="title-color">{{$value->name}}</h3></a>
                <p class="date-font">{{$value->created_at->format('d F, Y')}}</p>
            </div>
            @endforeach
 
        </div>
    </div>
</div>
@endsection