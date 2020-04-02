@extends('web.layouts.indexinner')
@section('title','INED LIBRARY')
@section('bannertitle','INED LIBRARY ')
@section('innerbannertitle', $categoryName)
@section('content')
@include('web.layouts.banner')
<div class="col-md-12 col-sm-12 col-xs-12 contact">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12 right_sidebar">
				<div class="col-md-12 col-sm-12 col-xs-12 data_row">
					@foreach($libraries as $lib)
					<div class="col-md-4 col-sm-4 col-xs-12 news_section ined_library_section">
						<img src="{{asset('admin/upload/library/'.$lib->image)}}" class="img-responsive" style="width: 100%" alt="" />
						<h3 class="title-color ined_library_video_title">{{$lib->name}}</h3>
						<p class="date-font ined_lib_date">{{$lib->created_at->format('d F, Y')}}</p>
					</div>
					@endforeach

				</div>
				

			</div>
			@include('web.layouts.sidebar.ined-sidebar')
		</div>
	</div>
</div>
@endsection