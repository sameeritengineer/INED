@extends('web.layouts.indexinner')
@section('title','All Editorial Boards')
@section('bannertitle','INED LIBRARY '.$categoryName)
@section('content')
@include('web.layouts.banner')
<div class="col-md-12 col-sm-12 col-xs-12 contact">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12 right_sidebar">
				<div class="col-md-12 col-sm-12 col-xs-12 data_row">
					@foreach($libraries as $lib)
					<div class="col-md-4 col-sm-4 col-xs-12 news_section ined_library_section">
						<iframe style="width: 100%; height: 150px;" src="{{$lib->url}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
						<h3 class="title-color ined_library_video_title">{{$lib->name}}</h3>
						<p class="date-font ined_lib_date">{{$lib->created_at->format('d F, Y')}}</p>
					</div>
					@endforeach

				</div>
				

			</div>
			@include('web.layouts.sidebar')
		</div>
	</div>
</div>
@endsection