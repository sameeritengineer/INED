@extends('web.layouts.indexinner')
@section('title','INED LIBRARY')
@section('bannertitle','INED LIBRARY ')
@section('innerbannertitle', $library->name)
@section('content')
@include('web.layouts.banner')
<div class="col-md-12 col-sm-12 col-xs-12 contact">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12 right_sidebar">


				<!-- <iframe src="https://docs.google.com/viewerng/viewer?url=http://localhost/projects/INED/public/admin/upload/library/video/051516-2284.ppt"></iframe> -->
<!-- 
				<iframe src='https://view.officeapps.live.com/op/embed.aspx?src=http://localhost/projects/INED/public/admin/upload/library/video/051516-2284.ppt' width='100%' height='600px' frameborder='0'></iframe>

<iframe src='https://view.officeapps.live.com/op/view.aspx?src=http://localhost/projects/INED/public/admin/upload/library/video/051516-2284.ppt' width='100%' height='600px' frameborder='0'>			
				<iframe src="https://docs.google.com/gview?url=http://ieee802.org/secmail/docIZSEwEqHFr.doc&embedded=true" frameborder="0">
</iframe> -->
@if($library->url != null)
               <iframe src="{{$library->url}}" width="100%" height="500px"></iframe>
                @else
                <iframe src="{{asset('admin/upload/library/video/'.$library->upload)}}" width="100%" height="500px"></iframe>
                @endif
                <h3 class="title-color ined_library_video_title">{{$library->name}}</h3>
				<p class="date-font ined_lib_date">{{$library->created_at->format('d F, Y')}}</p>
				{!! $library->description !!}
				
			</div>
           @include('web.layouts.sidebar.presentation-sidebar')
		</div>
	</div>
</div>
@endsection