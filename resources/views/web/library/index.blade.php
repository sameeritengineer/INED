@extends('web.layouts.indexinner')
@section('title','All Editorial Boards')
@section('bannertitle','INED LIBRARY SUBJECT AREA')
@section('content')
@include('web.layouts.banner')
<div class="col-md-12 col-sm-12 col-xs-12 contact">
	<div class="container">
		<div class="row">
			<div class="col-md-9 col-sm-9 col-xs-12 right_sidebar">
				<div class="col-md-12 col-sm-12 col-xs-12">

					@foreach($categories as $cats)
					<div class="col-md-6 col-sm-6 col-xs-12 news_section ined_library_section">
						<a class="margin_top_10" href="#"><img src="{{asset('admin/upload/category/'.$cats->image)}}" class="img-responsive" style="width: 100%" alt="" /></a>
						<h3 class="title-color">{{$cats->name}}</h3>
						<div class="cate_seciton">
							<ul>
								@foreach($types[$cats->name] as $key => $value)
								<li><a class="margin_top_10" href="#">{{$key}}</a>
									<h5>({{$value}})</h5>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
					@endforeach

					<div class="col-md-12 col-sm-12 col-xs-12 next_prev">
					<?php 
                      $links = $categories->links(); 
    $patterns = '#\?page=#';

    $replacements = '/page/';
    $one = preg_replace($patterns, $replacements, $links);

    $pattern2 = '#page/([1-9]+[0-9]*)/page/([1-9]+[0-9]*)#';
    $replacements2 = 'page/$2';
    $paginate_links = preg_replace($pattern2, $replacements2, $one);
    echo $paginate_links;
					?>
				</div>

				</div>
				<!-- <div class="col-md-12 col-sm-12 col-xs-12 next_prev">
					<a href="#"><i class="fa fa-angle-left"></i> PREVIOUS</a> 
					<a class="margin_left_20px" href="#"> NEXT <i class="fa fa-angle-right"></i></a> 
				</div> -->
			</div>
			@include('web.layouts.sidebar')
		</div>
	</div>
</div>
@endsection