<div class="col-md-12 col-sm-12 col-xs-12 footer-2">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-xs-12 col-sm-12 footer-section">
            <div class="col-md-3 col-sm-3 col-xs-12 ft-logo">
    	       <img src="{{asset('web/images/Main-logo-footer.png')}}" alt="logo" class="bottom-logo" />
             <div class="footer-p">
               <p>A-117, First Floor</p>
               <p>GD-ITL Northex Tower</p>
			   <p>Netaji Subhash Place</p>
			   <p>PitamPura, New Delhi 110034</p>
             </div>
              <span class="ft-social"><i class="fa fa-facebook"></i></span>
              <span class="ft-social"><i class="fa fa-instagram"></i></span>
              <span class="ft-social"><i class="fa fa-linkedin"></i></span> 
              <span class="ft-social"><i class="fa fa-twitter"></i></span>
           </div>
           <div class="col-md-6 col-sm-6 col-xs-12 ft-menu">
               <ul class="col-md-4 col-sm-4 col-xs-6">
                    <h3><a href="{{route('web.home')}}">Home</h3>
                    <li><a href="{{route('web.about-us')}}">About Us</a></li>
                    <li><a href="{{route('web.meet-the-team')}}">Leadership</a></li>
               </ul>
               <ul class="col-md-4 col-sm-4 col-xs-6 ft-menu-2">
                   <h3><a href="{{route('web.all-editorial')}}">Editorial board</a></h3>
                   <li><a href="{{route('web.privacy-policy')}}">Privacy Policy</a></li>
                   <li><a href="{{route('web.terms-of-use')}}">Terms of Use</a></li>
                   <!-- <li><a href="cookie-policy.php">Cookie Policy</a></li> -->
               </ul>
               <ul class="col-md-4 col-sm-4 col-xs-6 ft-menu-3 ft-menu-2">
                   <h3><a href="{{route('web.news-and-events')}}">News & Events</a></h3>
                   <li><a href="{{route('web.contact-us')}}">Contact Us</a></li>
                   <li><a href="{{route('web.ined-library')}}">Ined Library</a></li>
                   
               </ul>
           </div>
           <div class="col-md-3 col-sm-3 col-xs-12 ft-contect">
               <h3>Join Our Newsletter</h3>
               <p class="error"></p>
               <p class="success"></p>
               <input id="subscribe" type="email" class="ft-input form-control" placeholder="Email Address" name="">
               <input type="submit" value="Subscribe" class="subscribe" name="">
           </div>
        </div>
      </div>
    </div>
</div>

<div class="col-md-12 col-sm-12 col-xs-12 btm-footer">
  Copyright © 2020 INEDSYS. All Rights Reserved.
</div>

<script src="{{asset('web/js/swiper.js')}}" type="text/javascript"></script>
<script src="{{asset('web/js/script.js')}}" type="text/javascript"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
  $(".subscribe").click(function(){
    var email = $('#subscribe').val();
    if(email == ''){
      $('.ft-contect p.error').text('Please enter the email address'); 
    }else{
      var isemail = isEmail(email);
      if(isemail == false){
       $('.ft-contect p.error').text('Email is not valid'); 
       }else{
          
          $.ajax({
            url: "{{route('web.subscribe')}}",
            type: "POST",
            data: {
                "_token": "{{csrf_token()}}",
                "email": email
            },
            success: function(response) {
              if(response.success == false){
                $('.ft-contect p.error').show();
                $('.ft-contect p.success').hide();
                $('.ft-contect p.error').text(response.errors.email[0]);
              }else{
                $('.ft-contect p.success').show();
                $('.ft-contect p.error').hide();
                $('.ft-contect p.success').text('Subscribed succefully');
                $('#subscribe').val('');
              }
            },
        });

       }
    }
    
  });

  function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
});
</script>
<script type="text/javascript">
  var swiper = new Swiper('#testimonial .swiper-container', {
  slidesPerView: 2,
  //centeredSlides: true,
  spaceBetween: 30,
  pagination: {
    el: '#testimonial .swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '#testimonial .swiper-button-next',
    prevEl: '#testimonial .swiper-button-prev',
  },

  breakpoints: {
    1170: {
      slidesPerView: 1,
    }
  }
});

 var swiper = new Swiper('#news_events_slider .swiper-container', {
  slidesPerView: 3,
  //centeredSlides: true,
  spaceBetween: 30,
  pagination: {
    el: '#news_events_slider .swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '#news_events_slider .swiper-button-next',
    prevEl: '#news_events_slider .swiper-button-prev',
  },
  autoplay: 
    {
      delay: 5000,
    },
   loop: true,

  breakpoints: {
    1170: {
      slidesPerView: 1,
    }
  }
});

 var swiper = new Swiper('#custom-slider .swiper-container', {
  slidesPerView: 1,
  pagination: {
    el: '#custom-slider .swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '#testimonial .swiper-button-next',
    prevEl: '#testimonial .swiper-button-prev',
  }
});

  var swiper = new Swiper('#our_member_slider .swiper-container', {
  slidesPerView: 4,
  //centeredSlides: true,
  spaceBetween: 30,
  pagination: {
    el: '#our_member_slider .swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '#our_member_slider .swiper-button-next',
    prevEl: '#our_member_slider .swiper-button-prev',
  },

  breakpoints: {
    1220: {
      slidesPerView:4,
      spaceBetween: 30,
    },
    768: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    320: {
      slidesPerView: 1,
      
    }
  }
});
</script>
</body>
</html>