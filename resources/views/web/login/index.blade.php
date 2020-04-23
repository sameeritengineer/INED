@extends('web.layouts.indexinner')
@section('title','SIGN UP')
@section('bannertitle','SIGN UP')
@section('content')
@include('web.layouts.banner')

<div class="col-md-12 col-sm-12 col-xs-12 contact">
  <div class="container">
    <div class="col-md-12 col-sm-12 col-xs-12 border-outer" style="background-image: url(web/images/bgradientsignup.png);">
    <div class="row">
      <div  class="col-md-6 col-sm-6 col-xs-12 ">
        <div class="col-md-12 col-sm-12 col-xs-12 signup-form-side" style="background-image: url(web/images/Signupimg.png);">
          
        </div>
      </div>
      <div class="col-md-6 col-sm-6 col-xs-12 signup-form-field" >

        <div class="col-md-10 col-sm-10 col-xs-12 contact-section-signup">

                <h1 class="signup-heading">SIGN UP NOW</h1>
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

          <form class="enquiry-form" id="apnfrmReq_appt" action="{{route('web.sign-up-submit')}}" method="post">
            @csrf
            
            <img class="form-icon" src="{{asset('web/images/nameiconsignup.png')}}">
                  <input type="text" class="sign-up-field form-control vali" placeholder="Name*" name="name" id="name" required="">
                 
                 <img class="form-icon" src="{{asset('web/images/emailicon.png')}}">
                  <input type="email" class="sign-up-field form-control vali" placeholder="Email*" name="email"  id="email" required="">
                
                  <img class="form-icon" src="{{asset('web/images/Dropdown.png')}}">
                  <select  class="sign-up-field form-control vali" placeholder="Country*" name="country" id="country" required=""> 
                  <option value="">Select country</option>
                  @foreach($country as $country)
                      <option value="{{$country->id}}">{{$country->country_name}}</option>
                   @endforeach
                   </select>
              <img class="form-icon" src="{{asset('web/images/passwordicon.png')}}">
                  <input type="password" class="sign-up-field form-control vali" name="password" id="password" placeholder="Choose a password*" required="" pattern="^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$">

                  <p class="password-desc">Password should be atleast 8 Characters with atleast one CAPS letter, one number and one special Character.</p>

                  <div class="col-md-12 col-sm-12 col-xs-12 checkbox-bootom">
                    <input type="checkbox" class="checkbox-signup vali"  name="terms_policy"  id="terms_policy" value="1" required="">
                    <p class="chkbox-cont">I agree to the terms of services.</p>
                  </div>

                  <div class="col-md-12 col-sm-12 col-xs-12 checkbox-bootom">
                    <input type="checkbox" class="checkbox-signup" name="is_contributor" id="is_contributor" value="1">
                    <p class="chkbox-cont">Be a Contributor</p>
                  </div>

                  <input type="submit" id="apnbtnrequest" name="submit" class="sign-up-submit-btn" value="SUBMIT">

                  <div class="col-md-12 col-sm-12 col-xs-12 login-text">
                    <a href="sign-in">Already a member ? Login </a>
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

