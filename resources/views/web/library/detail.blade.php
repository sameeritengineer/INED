@extends('web.layouts.indexinner')
@section('title','All Editorial Boards')
@section('bannertitle','INED LIBRARY ')
@section('innerbannertitle', $categoryName)
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
				 	@if($key == 'videos')
                       <iframe style="width: 100%; height: 150px;" src="{{getYoutubeEmbedUrl($value->url)}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				 	@else
                       <img src="{{asset('admin/upload/library/'.$value->image)}}" class="img-responsive" style="width: 100%" alt="" />
				 	@endif
					<a href="{{route('web.ined-library-video-detail', ['categorySlug'=>$categorySlug,'typeSlug'=>$key,'Slug'=>$value->slug])}}"><h3 class="title-color ined_library_video_title">{{$value->name}}</h3></a>
						<p class="date-font ined_lib_date">{{$value->created_at->format('d F, Y')}}</p>
				</div>
				@endforeach
				</div>
				@endif
				@endforeach
                 @php
				 function getYoutubeEmbedUrl($url)
						{
						     $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
						     $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

						    if (preg_match($longUrlRegex, $url, $matches)) {
						        $youtube_id = $matches[count($matches) - 1];
						    }

						    if (preg_match($shortUrlRegex, $url, $matches)) {
						        $youtube_id = $matches[count($matches) - 1];
						    }
						    return 'https://www.youtube.com/embed/' . $youtube_id ;
						}
					@endphp

			</div>
			@include('web.layouts.sidebar.ined-sidebar')
		</div>
	</div>
</div>
@endsection