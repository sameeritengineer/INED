@extends('web.layouts.indexinner')
@section('title','verified ')
@section('bannertitle','verified ')
@section('content')
@include('web.layouts.banner')

<div class="col-md-12 col-sm-12 col-xs-12 contact">
  <div class="container">
    <div class="row">
        <h1 style="text-align:center;">{{$message}}</h1>
          
    </div>

  </div>
</div>

@endsection

