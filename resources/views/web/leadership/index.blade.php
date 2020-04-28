@extends('web.layouts.indexinner')
@section('title','LEADERSHIP')
@section('bannertitle','LEADERSHIP')
@section('content')
@include('web.layouts.banner')

 <div class="col-md-12 col-sm-12 col-xs-12 contact">
	<div class="container">
		 <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12 right_sidebar">
				<div class="col-md-12 col-sm-12 col-xs-12 team_row">

                   @foreach($members as $members)
					<div class="col-md-6 col-sm-6 col-xs-12 profile_row">
						<div class="profile_img">
							<img class="img-circle" src="{{asset('admin/upload/member/'.$members->image)}}" alt="{{$members->alt}}" />
						</div>

						<div class="profile_name testimonial_content">
	                        <h3 class="black_color">{{$members->name}}</h3>
	                        <p class="testimonial_p_profile theme_color">{!!$members->description!!}</p>
						</div>
					</div>
					@endforeach
				</div>

			</div>
		</div>
	</div>
</div> 


@endsection