<div class="col-md-3 col-sm-3 col-xs-12 left_sidebar">
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
			<li><a href="{{route('web.ined-library-detail', ['categorySlug'=>$cat->slug])}}"><i class="cangle-right fa fa-angle-right"></i>{{$cat->name}}</a></li>
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
			<li><a href="{{route('web.ined-library-detail', ['categorySlug'=>$recent->slug])}}"><i class="cangle-right fa fa-angle-right"></i>{{$recent->name}}</a></li>
			@endforeach
		</ul>
	</div>
	@if (in_array(Route::current()->getName(), array('web.ined-library-detail')))
	<div class="sidebar_category">
		<ul>
			@if($sidebar['team_count'] > 0)
            <li><a href="{{route('web.meet-the-team')}}/{{ \Request::segment(2)}}"><i class="fa fa-angle-right"></i> meet the team</a></li>
			@else
			<li><a href="{{route('web.coming')}}"><i class="cangle-right fa fa-angle-right"></i> meet the team</a></li>
			@endif
			<!-- <li><a href="#"><i class="fa fa-angle-right"></i> Recent News</a></li> -->
		</ul>
	</div>
	@endif

	<div class="sidebar_category">
		<h3 class="title-color">Disclaimer </h3>
		<ul style="text-align:justify;">
			Disclaimers help companies protect themselves against legal claims by addressing liabilities specific to their operations.Although businesses, websites, and apps in all industries can benefit from the legal protection a disclaimer statement offers, they’re especially useful for platforms that manage:
		</ul>
	</div>

</div>