@extends('web.layouts.indexinner')
@section('title','All Editorial Boards')
@section('bannertitle','INED LIBRARY ')
@section('innerbannertitle', $categoryName)
@section('content')
@include('web.layouts.banner')
<div class="col-md-12 col-sm-12 col-xs-12 contact">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12 right_sidebar">
				@foreach($typedata as $key => $values)
				@if(count($values) > 0)
				<div class="col-md-12 col-sm-12 col-xs-12 data_row">
				 <h3 class="title-color margin_top">{{$key}}</h3>
				 @foreach($values as $value)
				 <div class="col-md-4 col-sm-4 col-xs-12 news_section ined_library_section">
				 	@if($key == 'videos')
				 	   <?php if(1==2){?>
                       <iframe style="width: 100%; height: 150px;" src="{{getYoutubeEmbedUrl($value->url)}}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                       <?php } ?>
                        <img src="{{asset('admin/upload/library/'.$value->image)}}" class="img-responsive" style="width: 100%" alt="" />
				 	@else
                       <img src="{{asset('admin/upload/library/'.$value->image)}}" class="img-responsive" style="width: 100%" alt="" />
				 	@endif

				 	<?php if(isset($session['userId'])){ ?>
						<a href="{{route('web.ined-library-video-detail', ['categorySlug'=>$categorySlug,'typeSlug'=>$key,'Slug'=>$value->slug])}}"><h3 class="title-color ined_library_video_title">{{$value->name}}</h3></a>
                        <?php } else { ?>
                        <a href="javascript:void(0)" class="open-button" onclick="openForm('<?php echo $value->id; ?>')"><h3 class="title-color ined_library_video_title">{{$value->name}}</h3></a>
                        <div class="form-popup form-container" id="myForm_{{$value->id}}">
                        	<form action="{{ route('web.restiction') }}" method="POST" enctype="multipart/form-data">
                  	          @csrf
							<div class="col-md-12">
							    <div class="col-md-12"><h3>Message:</h3></div>
							     <div class="col-md-10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the </div>
						    </div>
						    <input type="hidden" name="hid" value="{{$value->id}}">
						    <input type="hidden" name="redirect_url" value="{{route('web.ined-library-video-detail', ['categorySlug'=>$categorySlug,'typeSlug'=>$key,'Slug'=>$value->slug])}}" >
						    <div class="col-md-12">
						    	<div class="col-md-6">
						    		<button type="submit" name="login" value="login" class="btn">Login</button>
							    </div>
							    <div class="col-md-6">
							    	<button type="submit" value="guest" name="login" class="btn">Continue as Guest</button>
							    </div>
						    </div>
						    </form>
						    <div class="col-md-12">
							    	<button type="button" class="btn cancel" onclick="closeForm('<?php echo $value->id; ?>')">Close</button>
							</div>
						</div>
                        <?php } ?>
						<p class="date-font ined_lib_date">{{$value->created_at->format('d F, Y')}}</p>
				</div>
				@endforeach
				</div>
				@endif
				@endforeach
                 @php
				 function getYoutubeEmbedUrl($url)
						{
						     $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
						     $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

						    if (preg_match($longUrlRegex, $url, $matches)) {
						        $youtube_id = $matches[count($matches) - 1];
						    }

						    if (preg_match($shortUrlRegex, $url, $matches)) {
						        $youtube_id = $matches[count($matches) - 1];
						    }
                            return 'https://www.youtube.com/embed/' . $youtube_id ;
						}
					@endphp

			</div>
			@include('web.layouts.sidebar.ined-sidebar')
		</div>
	</div>
</div>
<script>
function openForm(id) {
    document.getElementById("myForm_"+id).style.display = "block";
}

function closeForm(id) {
  document.getElementById("myForm_"+id).style.display = "none";
}
</script>
@endsection