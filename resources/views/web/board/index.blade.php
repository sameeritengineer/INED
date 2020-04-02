@extends('web.layouts.indexinner')
@section('title','All Editorial Boards')
@section('bannertitle','Editorial Boards')
@section('content')
@include('web.layouts.banner')
<div class="col-md-12 col-sm-12 col-xs-12 contact">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12 right_sidebar">

@foreach($boards as $board)

				<div  id="editorial-1" class="col-md-12 col-sm-12 col-xs-12 profile_section {{$board->slug}}">
					<div class="col-md-12 col-sm-12 col-xs-12 profile_row">
						<div class="profile_img">
							<img class="img-circle" src="{{asset('admin/upload/board/'.$board->image)}}" alt="{{$board->alt}}" />
						</div>

						<div  class="profile_name testimonial_content">
	                        <h3>{{$board->name}}</h3>
	                        <p class="testimonial_p_profile"><b>{{$board->designation}}</b></p>
	                        <p >{{$board->s_description}}</p>
						</div>
					</div> <span id="dots">
					<div class="col-md-12 col-sm-12 col-xs-12 profile_des">
						<div class="truncate">{!! $board->l_description !!}</div>
					</div>
					
				</div>
@endforeach

			</div>
			@include('web.layouts.sidebar.board-sidebar')
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
  (function() {
    var showChar = 800;
    var ellipsestext = "...";

    $(".truncate").each(function() {
      var content = $(this).html();
      if (content.length > showChar) {
        var c = content.substr(0, showChar);
        var h = content;
        var html =
          '<div class="truncate-text" style="display:block">' +
          c +
          '<span class="moreellipses">' +
          ellipsestext +
          '&nbsp;&nbsp;<a href="" class="moreless more">more</a></span></span></div><div class="truncate-text" style="display:none">' +
          h +
          '<a href="" class="moreless less">Less</a></span></div>';

        $(this).html(html);
      }
    });

    $(".moreless").click(function() {
      var thisEl = $(this);
      var cT = thisEl.closest(".truncate-text");
      var tX = ".truncate-text";

      if (thisEl.hasClass("less")) {
        cT.prev(tX).toggle();
        cT.slideToggle();
      } else {
        cT.toggle();
        cT.next(tX).fadeToggle();
      }
      return false;
    });
    /* end iffe */
  })();
$('html, body').animate({
        scrollTop: $(".{{$slug}}").offset().top
    }, 2000);
  /* end ready */
});

</script>	
@endsection