@extends('web.layouts.indexinner')
@section('title','All Editorial Boards')
@section('bannertitle','INED LIBRARY '.$categoryName)
@section('content')
@include('web.layouts.banner')
<div class="col-md-12 col-sm-12 col-xs-12 contact">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12 right_sidebar">
				@foreach($typedata as $key => $values)
				@if(count($values) > 0)
				<div class="col-md-12 col-sm-12 col-xs-12 data_row">
				 <h3 class="title-color margin_top">{{$key}}</h3>
				 @foreach($values as $value)
				 <div class="col-md-4 col-sm-4 col-xs-12 news_section ined_library_section">
				 	@if($key == 'video')
                       <iframe style="width: 100%; height: 150px;" src="{{$value->url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				 	@else
                       <img src="{{asset('admin/upload/library/'.$value->image)}}" class="img-responsive" style="width: 100%" alt="" />
				 	@endif
						<h3 class="title-color ined_library_video_title">{{$value->name}}</h3>
						<p class="date-font ined_lib_date">{{$value->created_at->format('d F, Y')}}</p>
				</div>
				@endforeach
				</div>
				@endif
				@endforeach

			</div>
			@include('web.layouts.sidebar')
		</div>
	</div>
</div>
@endsection