@extends('web.layouts.indexinner')
@section('title','INED LIBRARY')
@section('bannertitle','INED LIBRARY ')
@section('innerbannertitle', $categoryName)
@section('content')
@include('web.layouts.banner')
<div class="col-md-12 col-sm-12 col-xs-12 contact">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12 right_sidebar">
				<div class="col-md-12 col-sm-12 col-xs-12 data_row">
					@foreach($libraries as $lib)
					<div class="col-md-4 col-sm-4 col-xs-12 news_section ined_library_section">
						<img src="{{asset('admin/upload/library/'.$lib->image)}}" class="img-responsive" style="width: 100%" alt="" />
						<?php if(isset($session['userId'])){ ?>
						<a href="{{route('web.ined-library-presentation-detail', ['categorySlug'=>$categorySlug,'typeSlug'=>$typeSlug,'Slug'=>$lib->slug])}}"><h3 class="title-color ined_library_video_title">{{$lib->name}}</h3></a>
                        <?php } else { ?>
                        <a href="javascript:void(0)" class="open-button" onclick="openForm('<?php echo $lib->id; ?>')"><h3 class="title-color ined_library_video_title">{{$lib->name}}</h3></a>
                        <div class="form-popup form-container" id="myForm_{{$lib->id}}">
                        	<form action="{{ route('web.restiction') }}" method="POST" enctype="multipart/form-data">
                  	          @csrf
							<div class="col-md-12">
							    <div class="col-md-12"><h3>Message:</h3></div>
							     <div class="col-md-10">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the </div>
						    </div>
						    <input type="hidden" name="hid" value="{{$lib->id}}">
						    <input type="hidden" name="redirect_url" value="{{route('web.ined-library-presentation-detail', ['categorySlug'=>$categorySlug,'typeSlug'=>$typeSlug,'Slug'=>$lib->slug])}}" >
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
							    	<button type="button" class="btn cancel" onclick="closeForm('<?php echo $lib->id; ?>')">Close</button>
							</div>
						</div>
                        <?php } ?>
						<p class="date-font ined_lib_date">{{$lib->created_at->format('d F, Y')}}</p>
					</div>
					@endforeach

				</div>
				

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