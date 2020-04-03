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
						<div class="blog_date">{{ date('d F, Y', strtotime(trim($value->date))) }}</div>
						<h3 class="title-color">{{$value->name}}</h3>
												<a class="a_href_btn margin_top_10" href="{{$value->url}}" target="_blank">Read More</a>
					</div>
					@endforeach
                    {{ $news->links() }}
			    </div>

			 			
		</div>
	      @include('web.layouts.sidebar.news-sidebar')
</div>
</div>
</div>

@endsection