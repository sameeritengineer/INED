<div class="col-md-3 col-sm-3 col-xs-12 left_sidebar">
	<div class="sidebar_search">
		<form class="search_form" action="{{route('web.search')}}" method="post">
			@csrf
			<input type="search" placeholder="Search" class="search_field" name="">
			<button type="button" class="search_submit_btn"><i class="cangle-right fa fa-search"></i></button>
		</form>
	</div>

	<div class="sidebar_category">
		<h3 class="title-color">Recommended video</h3>
		<ul>
			@foreach($libraryList as $video)
			<li>
				@if($video->url != null)
                <iframe style="width: 100%; height: 150px;" src="{{getYoutubeEmbedUrl($video->url)}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @else
                <video width="100%" height="150" controls>
			      <source src="{{asset('admin/upload/library/video/'.$video->upload)}}" type=video/mp4>
			    </video>
                @endif
                <a href="{{route('web.ined-library-video-detail', ['categorySlug'=>$categorySlug,'typeSlug'=>$typeSlug,'Slug'=>$video->slug])}}"><h3 class="title-color ined_library_video_title">{{$video->name}}</h3></a>
			</li>
			@endforeach
		</ul>
	</div>
</div>