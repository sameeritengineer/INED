@extends('web.layouts.indexinner')
@section('title','INED LIBRARY')
@section('bannertitle','INED LIBRARY ')
@section('innerbannertitle', $library->name)
@section('content')
@include('web.layouts.banner')
<div class="col-md-12 col-sm-12 col-xs-12 contact">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12 right_sidebar">

				@if($library->url != null)
                <iframe style="width: 100%; height: 500px;" src="{{getYoutubeEmbedUrl($library->url)}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @else
                <video width="100%" height="500" controls>
			      <source src="{{asset('admin/upload/library/video/'.$library->upload)}}" type=video/mp4>
			    </video>
                @endif
                <h3 class="title-color ined_library_video_title">{{$library->name}}</h3>
				<p class="date-font ined_lib_date">{{$library->created_at->format('d F, Y')}}</p>
				{!! $library->description !!}
				
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
			 @include('web.layouts.sidebar.video-sidebar')
		</div>
	</div>
</div>
@endsection