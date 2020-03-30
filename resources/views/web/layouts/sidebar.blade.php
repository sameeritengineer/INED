<div class="col-md-3 col-sm-3 col-xs-12 left_sidebar">
	<div class="about_content">
	<h3 class="title-color margin_top">About</h3>
	<p>Dr.Sanjaya Satapathy graduated from Veer Surendra Sai Medical College of Sambalpur University,
India. He completed his Residency in Internal Medicine training at the same college, and then 2 year
of Hepatology training at the Post Graduate Institute of Medical Education and Research at Chandigarh, India.</p>
	</div>
	<div class="sidebar_search">
		<form class="search_form">
			<input type="search" placeholder="Search" class="search_field" name="">
			<button type="button" class="search_submit_btn"><i class="fa fa-search"></i></button>
		</form>
	</div>
	<div class="sidebar_category">
		<h3 class="title-color">Categories</h3>
		<ul>
			@foreach($categories as $cat)
			<li><a href="#"><i class="fa fa-angle-right"></i>{{$cat->name}}</a></li>
			@endforeach
		</ul>
	</div>
	<div class="sidebar_category">
		<ul>
			<li><a href="#"><i class="fa fa-angle-right"></i> Meet our team</a></li>
			<li><a href="#"><i class="fa fa-angle-right"></i> Recent News</a></li>
		</ul>
	</div>
</div>