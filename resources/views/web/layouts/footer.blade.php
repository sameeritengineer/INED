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
                    <h3><a href="editorial-boards.php">Home</h3>
                    <li><a href="about-us.php">About Us</a></li>
                    <li><a href="meet-the-team.php">Leadership</a></li>
               </ul>
               <ul class="col-md-4 col-sm-4 col-xs-6 ft-menu-2">
                   <h3><a href="editorial-boards.php">Editorial board</a></h3>
                   <li><a href="privacy-policy.php">Privacy Policy</a></li>
                   <li><a href="terms-of-use.php">Terms of Use</a></li>
                   <li><a href="cookie-policy.php">Cookie Policy</a></li>
               </ul>
               <ul class="col-md-4 col-sm-4 col-xs-6 ft-menu-3 ft-menu-2">
                   <h3><a href="news-and-events.php">News & Events</a></h3>
                   <li><a href="contact.php">Contact Us</a></li>
                   <li><a href="ined-library.php">Ined Library</a></li>
                   
               </ul>
           </div>
           <div class="col-md-3 col-sm-3 col-xs-12 ft-contect">
               <h3>Join Our Newsletter</h3>
               <input type="email" class="ft-input form-control" placeholder="Email Address" name="">
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