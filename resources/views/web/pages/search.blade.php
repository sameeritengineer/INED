@extends('web.layouts.indexinner')
@section('title','SEARCH')
@section('bannertitle','SEARCH')
@section('content')
@include('web.layouts.banner')
<style>
.slider-img-testimonial-search img {
    width: 150px;
    margin: 0 !important;
    display: inline;
}
.slider-img-testimonial-search {
    float: left;
}
.slider-img-testimonial-search {
    float: left;
    margin-right: 25px;
}
.testimonial_content-search h3 {
    font-weight: 600;
    color: #ae272e;
    font-size: 20px;
}
.testimonial_content-search p {
    color: #000;
    letter-spacing: 1px;
    line-height: 25px;
    font-size: 16px;
    text-align: justify;
}
</style>
<div class="col-md-12 col-sm-12 col-xs-12 contact">
	<div class="container">
			<div class="col-md-12 col-sm-12 col-xs-12 right_sidebar">
				<div class="col-md-12 col-sm-12 col-xs-12 news_section post_section profile_section">
                 <h3 class="section-title">Search Result for: {{$search}}</h3>
				</div>
			</div>
			<div class="row">
			@if(count($categories) > 0)
			<h3>Result For Category:</h3>
			 @foreach($categories as $cat)
            <a href="{{route('web.ined-library-detail', ['categorySlug'=>$cat->slug])}}">
            <div class="col-md-4 col-sm-4 col-xs-12 three_row_section">
                <img src="{{asset('admin/upload/category/'.$cat->image)}}" alt="{{$cat->alt}}" class="img-responsive" />
                <div class="img_split">{{$cat->name}}</div>
            </div>
            </a>
            @endforeach
            @else
            <h3>No Result Found for category:</h3>
            @endif
            </div>

            <div class="row">
           	@if(count($boards) > 0)
			<h3>Result For Editorial Boards:</h3>
           	@foreach($boards as $board)
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slider-row-search">
                    <div class="slider-img-testimonial-search">
                        <img src="{{asset('admin/upload/board/'.$board->image)}}" class="img-responsive" alt="{{$board->alt}}">
                    </div>
                    <div class="testimonial_content-search">
                        <h3>{{$board->name}}</h3>
                        <p class="testimonial_p_profile"><b>{{$board->designation}}</b></p>
                        <p>{{ $board->s_description }}</p>
                        <a class="read_more_text" href="{{route('web.all-editorial', $board->slug)}}">Read More</a>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <h3>No Result Found for Editorial Board:</h3>
            @endif
            </div>

		
	</div>
</div>
@endsection