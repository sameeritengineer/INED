<div class="col-md-3 col-sm-3 col-xs-12 left_sidebar">
	<div class="sidebar_search">
		<form class="search_form" action="{{route('web.search')}}" method="post">
			@csrf
			<input type="text" name="search" placeholder="Search" class="search_field" name="">
			<button type="submit" class="search_submit_btn"><i class="fa fa-search"></i></button>
		</form>
	</div>
	<!-- <div class="sidebar_category">
		<h3 class="title-color">INED Library</h3>
		<ul>
			@foreach($sidebar['categories'] as $cat)
			<li><a href="{{route('web.ined-library-detail', ['categorySlug'=>$cat->slug])}}"><i class="fa fa-angle-right"></i>{{$cat->name}}</a></li>
			@endforeach
			@if(count($sidebar['categories']) >= 6)
            <a href="{{route('web.ined-library')}}">view more</a>
			@endif
		</ul>
	</div>
	<div class="sidebar_category">
		<h3 class="title-color">New Content</h3>
		<ul>
			@foreach($sidebar['recent_categories'] as $recent)
			<li><a href="{{route('web.ined-library-detail', ['categorySlug'=>$recent->slug])}}"><i class="fa fa-angle-right"></i>{{$recent->name}}</a></li>
			@endforeach
		</ul>
	</div> -->
	@if(count($sidebar['recent_news']) > 0)
	<div class="sidebar_category">
		<h3 class="title-color">New Events</h3>
		<ul>
			@foreach($sidebar['recent_news'] as $news)
			<li><a href="{{$news->url}}"><i class="fa fa-angle-right"></i>{{$news->name}}</a></li>
			@endforeach
		</ul>
	</div>
	@endif
</div>