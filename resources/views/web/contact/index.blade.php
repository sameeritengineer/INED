@extends('web.layouts.indexinner')
@section('title','CONTACT US')
@section('bannertitle','CONTACT US')
@section('content')
@include('web.layouts.banner')

<div class="col-md-12 col-sm-12 col-xs-12 contact">
  <div class="container">
    <div class="row">
      <div class="kindly-contact-inner contact-h3 col-md-12 col-sm-12 colxs-12">
        <h3 class="">Get In Touch With Us</h3>
      </div>
      <div class="col-md-8 col-sm-8 col-xs-12">
        <div class="col-md-12 col-sm-12 col-xs-12 contact-section">
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (\Session::has('success'))
<div class="alert alert-success">
<strong>Success!</strong> {!! \Session::get('success') !!}
</div>
@endif
@if (\Session::has('error'))
<div class="alert alert-danger">
<strong>Danger!</strong> {!! \Session::get('error') !!}
</div>
@endif
          <form class="enquiry-form" action="{{route('web.contact-submit')}}" method="post">
            @csrf
            <label>Your Name (required)</label>
                  <input type="text" class="enquiry-feild form-control" name="name" required="">
                  <label>Your Email (required)</label>
                  <input type="email" class="enquiry-feild form-control" name="email" required="" >
                  <label>Phone (required)</label>
                  <input type="number" class="enquiry-feild form-control" name="phone" required="" >
                  <label>Subject (required)</label>
                  <input type="text" class="enquiry-feild form-control" name="subject" required="">
                  <label>Your Message (required)</label>
                  <textarea class="text_area form-control" required="" name="message"></textarea>
                  <input type="submit" name="submit" class="submit-btn" value="SUBMIT">
              </form>
            </div>
      </div>
      <div style="background-image: url({{asset('web/images/Contact-Us-page-address.jpg')}});" class="col-md-4 col-sm-4 col-xs-12 address_sidebar">
        <h3>Address</h3>
        <p>Toronto General Hospital,<br> Pitam Pura New Delhi<br> Delhi - 110034</p>
        <h3>Email</h3>
        <p>inedsysinfo@gmail.com</p>
        <h3>Contact Us</h3>
        <p>9999 99 0801</p>
      </div>
    </div>
  </div>
</div>

<div style="background-image: url({{asset('admin/images/contact-us-footer-a.png')}});" class="contact-img col-md-12 col-sm-12 col-xs-12">
  <h3>Contact Us</h3>
</div>

@endsection