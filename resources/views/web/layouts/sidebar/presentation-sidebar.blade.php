<div class="col-md-3 col-sm-3 col-xs-12 left_sidebar">
	<div class="sidebar_search">
		<form class="search_form" action="{{route('web.search')}}" method="post">
			@csrf
			<input type="search" placeholder="Search" class="search_field" name="">
			<button type="button" class="search_submit_btn"><i class="fa fa-search"></i></button>
		</form>
	</div>

	<div class="sidebar_category">
		<h3 class="title-color">Recommended Presentation</h3>
		<ul>
			@foreach($libraryList as $video)
			<li>
                <img src="{{asset('admin/upload/library/'.$video->image)}}" class="img-responsive" style="width: 100%" alt="" />
                <a href="{{route('web.ined-library-video-detail', ['categorySlug'=>$categorySlug,'typeSlug'=>$typeSlug,'Slug'=>$video->slug])}}"><h3 class="title-color ined_library_video_title">{{$video->name}}</h3></a>
			</li>
			@endforeach
		</ul>
	</div>
	
	@if(count($recent_news) > 0)
	<div class="sidebar_category">
		<h3 class="title-color">New Events</h3>
		<ul>
			@foreach($recent_news as $news)
			<li><a href="{{$news->url}}"><i class="fa fa-angle-right"></i>{{$news->name}}</a></li>
			@endforeach
		</ul>
	</div>
	@endif
</div>