@extends('web.layouts.indexinner')
@section('title','LOGIN')
@section('bannertitle','LOGIN')
@section('content')
@include('web.layouts.banner')

<div class="col-md-12 col-sm-12 col-xs-12 contact">
  <div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12 border-outer" style="background-image: url(web/images/bgradientsignup.png);">
    <div class="row">
      <div  class="col-md-6 col-sm-6 col-xs-12 ">
        <div class="col-md-12 col-sm-12 col-xs-12 signup-form-side" style="background-image: url(web/images/login-img.png);">
          
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12 signup-form-field" >

        <div class="col-md-10 col-sm-10 col-xs-12 contact-section-signup" >

                <h1 class="signup-heading">LOGIN</h1>
                @if (Session::get('error'))
                 <div class="alert alert-danger">
                            <ul>
                                    <li>{{ Session::get('error') }}</li>
                            </ul>
                        </div>
               @endif   

              @if (Session::get('success'))
                 <div class="alert alert-success">
                            <ul>
                                    <li>{{ Session::get('success') }}</li>
                            </ul>
                        </div>
               @endif  

                @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif   

          <form class="enquiry-form" id="apnfrmReq_appt" action="{{route('web.sign-in-submit')}}" method="post">
            @csrf
            
            
              <img class="form-icon" src="{{asset('web/images/emailicon.png')}} ">
                  <input type="email" class="sign-up-field form-control" placeholder="Email*" name="email" required="">

              <img class="form-icon" src="{{asset('web/images/passwordicon.png')}}">
                  <input type="password" class="sign-up-field form-control" name="password" placeholder="Choose a password" required="">

                  <div class="col-md-12 col-sm-12 col-xs-12 checkbox-bootom-login">
                    <input type="checkbox" class="checkbox-signup" placeholder="Country*" name="your_phone">
                    <p class="checkbox-signup">Rmemeber Me</p>
                  </div>

                  <input type="submit" name="submit" class="login-submit-btn" value="Sign In">
                  

                  <h3 class="social-login-head">Continue With</h3>

                  <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12 social-login" style="background: #395694">
                      <a href=""><p><img class="facebook-login" src="{{asset('web/images/fbicon.png')}}">Sign In with Facebook</p></a>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-12 social-login" style="background: #d44235">
                      <a href=""><p><img class="google-login" src="{{asset('web/images/googleicon.png')}}">Sign in with Google</p></a>
                    </div>
                    
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12 login-text">
                    <a href="sign-up">Don't have an Account? Signup </a>
                </div>

              </form>
            </div>
      </div>
    </div>
    </div>
  </div>
</div>


<div style="background-image: url(images/contact-us-footer-a.png);" class="contact-img col-md-12 col-sm-12 col-xs-12">
  <h3>Contact Us</h3>
</div>

@endsection

