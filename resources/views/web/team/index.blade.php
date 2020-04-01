@extends('web.layouts.indexinner')
@section('title','MEET THE TEAM')
@section('bannertitle','MEET THE TEAM')
@section('content')
@include('web.layouts.banner')

 <div class="col-md-12 col-sm-12 col-xs-12 contact">
	<div class="container">
		 <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 right_sidebar">
				<div class="col-md-12 col-sm-12 col-xs-12 team_row">

                   @foreach($teams as $team)
					<div class="col-md-6 col-sm-6 col-xs-12 profile_row">
						<div class="profile_img">
							<img class="img-circle" src="{{asset('admin/upload/team/'.$team->image)}}" alt="{{$team->alt}}" />
						</div>

						<div class="profile_name testimonial_content">
	                        <h3 class="black_color">{{$team->name}}, {{$team->education}}</h3>
	                        <p class="testimonial_p_profile theme_color">{{$team->designation}}</p>
	                        <p>{{$team->location}}</p>
						</div>
					</div>
					@endforeach
				</div>

				

			</div>
		</div>
	</div>
</div> 
<div style="background-image: url({{asset('web/images/meet_team.jpg')}});" class="contact-img col-md-12 col-sm-12 col-xs-12">
	<div class="container">
		<div class="row display_grid">
			<h4 class="text-white">Are you interested in our membership ?</h4>
			<a class="text-white text_decoration_none" href="{{route('web.contact-us')}}"><h3>Contact Us</h3></a>	
		</div>
	</div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 our_member_slider" id="our_member_slider">
	<div class="container">
		 <div class="row">
		 	<h3 class="section-title">Our Members</h3>
		 	<p class="title-p-des">International Medical Education</p>
		 	<div class="swiper-container">
		 		<div class="swiper-wrapper">
		 			@foreach($members as $member)
		 			<div class="swiper-slide">
		 				<img class="img-responsive" src="{{asset('admin/upload/member/'.$member->image)}}" alt="{{$member->alt}}" />
		 			</div>
		 			@endforeach
		 			
		 		</div>
		 		<div class="swiper-pagination"></div>
		 	</div> 
		 </div> 
	</div>
	
</div> 

@endsection