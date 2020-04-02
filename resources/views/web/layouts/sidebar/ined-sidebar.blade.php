<div class="col-md-3 col-sm-3 col-xs-12 left_sidebar">
	<div class="about_content">
	<h3 class="title-color margin_top">About</h3>
	<p> We strive to bring together the best medical content from major publishers and medical leaders in their specialty, faculty from top training programs to create a large up-to-date training library for healthcare practitioners using fast, easy, effective online learning tools.
			<a class="read_more_text padding-top-10" href="{{route('web.about-us')}}">Read More</a></p>
	</div>
	<div class="sidebar_search">
		<form class="search_form" action="{{route('web.search')}}" method="post">
			@csrf
			<input type="search" placeholder="Search" class="search_field" name="">
			<button type="button" class="search_submit_btn"><i class="fa fa-search"></i></button>
		</form>
	</div>
	<div class="sidebar_category">
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
	</div>
	<div class="sidebar_category">
		<h3 class="title-color">New Events</h3>
		<ul>
			@foreach($sidebar['recent_news'] as $news)
			<li><a href="{{$news->url}}"><i class="fa fa-angle-right"></i>{{$news->name}}</a></li>
			@endforeach
		</ul>
	</div>
	<div class="sidebar_category">
		<ul>
			<li><a href="{{route('web.meet-the-team')}}"><i class="fa fa-angle-right"></i> Meet our team</a></li>
			<!-- <li><a href="#"><i class="fa fa-angle-right"></i> Recent News</a></li> -->
		</ul>
	</div>
</div>