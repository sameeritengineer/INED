@extends('web.layouts.indexinner')
@section('title','ABOUT US')
@section('bannertitle','ABOUT US')
@section('content')
@include('web.layouts.banner')
<div class="col-md-12 col-sm-12 col-xs-12 contact">
	<div class="container">
		<div class="row"> 
					<div class="col-md-12 col-sm-12 col-xs-12 aboutus_des">
					 <p>Today, electronic publication has the potential to radically alter the way that scientific information  is being disseminated. We at INEDSYS intend to create a world class medical e-library with high-quality content that would be accessible to anyone anywhere. We aim to cover every topic in the medical field to create comprehensive e-books that are easy to read,and based on self-paced learning. In addition, each complete e-book will be indexed for easy access.</p>
												
					<p>We believe in the highest quality and our content would be reviewed by an editorial board. The editorial board would comprise experienced and reputed professionals. These are educators who are not just "Well-known", but who have made significant research contributions. INEDSYS would bring together experts from various specialties in medical field from across the globe to create, assimilate and present the most up-to-date and quality information and make it available to anyone anywhere. <p>

					</div>
					
				</div>
			</div>
		</div>
		<div class="how-we-work">
				<h2 >HOW DO WE WORK?</h2>
				<div class="col-md-12 col-sm-12 col-xs-12 how-we-work-flow">
					<img src="{{asset('web/images/about_us_page.png')}}" alt="how we work">
				</div>
		</div>
	</div>
</div>
<div class="col-md-12 col-sm-12 col-xs-12 footer-banner-bg" style="background-image: linear-gradient(to right, #a22a33 , #20a8a6);">
	<div class="container">
    	<div class="col-md-6 col-sm-6 col-xs-12 footer-banner-head">
    		<span class="footer-banner-title">GET IN TOUCH WITH US</span>
    	</div>
    	<div class="col-md-6 col-sm-6 col-xs-12 contact_button_name">
    		<a href="{{route('web.contact-us')}}"><span class="contact_button">CONTACT US</span></a>
    	</div>	
    	</div>
</div>
@endsection