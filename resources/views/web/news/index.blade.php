@extends('web.layouts.indexinner')
@section('title','NEWS & EVENTS')
@section('bannertitle','NEWS & EVENTS')
@section('content')
@include('web.layouts.banner')

<div class="col-md-12 col-sm-12 col-xs-12 contact">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12 right_sidebar">
				<div class="col-md-12 col-sm-12 col-xs-12">
					@foreach($news as $value)
					<div class="col-md-6 col-sm-6 col-xs-12 news_section">
						<a class="" href="{{$value->url}}" target="_blank"><img src="{{asset('admin/upload/news/'.$value->image)}}" class="img-responsive" style="width: 100%" alt=""></a>
						<div class="blog_date">{{$value->created_at->format('d F, Y')}}</div>
						<h3 class="title-color">{{$value->name}}</h3>
												<a class="a_href_btn margin_top_10" href="{{$value->url}}" target="_blank">Read More</a>
					</div>
					@endforeach
                    {{ $news->links() }}
			    </div>

			 			
		</div>
		<div class="col-md-3 col-sm-3 col-xs-12 left_sidebar">
	<div class="about_content">
	<h3 class="title-color margin_top">About</h3>
	<p>We strive to bring together the best medical content from major publishers and medical leaders in their specialty, faculty from top training programs to create a large up-to-date training library for healthcare practitioners using fast, easy, effective online learning tools.</p>
	<a class="read_more_text padding-top-10" href="{{route('web.about-us')}}">Read More</a>
	</div>
	</div>	</div>
</div>
</div>

@endsection