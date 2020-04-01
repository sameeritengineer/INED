<!---- Phone View menu -->
<div class="bg-img">
    <div class="mob-nav">
        <p class="close-btn"><i class="fa fa-close"></i></p>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="#" target="top">About Us</a></li>
            <li><a href="editorial-boards.php">Editorial Board</a></li>
            <li><a href="news-and-events.php">News &amp; Events</a></li>
            <li><a href="contact.php" target="top">Contact Us</a></li>
        </ul>
    </div>
</div> 
<!---- //Phone View menu-->  

<div class="col-md-12 col-sm-12 col-xs-12 header-menu">
    <div class="container">
        <div class="row">
            <div class="menu-nav col-xs-12 col-sm-12 col-md-12">
                <div class="col-md-2 col-sm-2 col-xs-4 logo">
                    <a href="{{route('web.home')}}" alt=""><img src="{{asset('web/images/Main-logo-white.png')}}" alt="logo" /></a>
                </div>
                <div class="col-md-10 col-sm-10 col-xs-8 menu">
                    <ul class="navigation">
                        <li style="border-left:0px;"><a href="{{route('web.home')}}">Home</a></li>
                        <li class="about-menu"><a href="{{route('web.about-us')}}">About Us <i class="fa fa-angle-down"></i></a>
                            <ul class=" sub-ul">
                                <li><a href="{{route('web.meet-the-team')}}">Leadership</a></li>
                                <li><a href="{{route('web.ined-library')}}">INED Library</a></li>
                               <!-- <li><a href="our-goal.php">Our Goal</a></li> -->
                            </ul>
                        </li>
                        <li><a href="{{route('web.all-editorial')}}">Editorial Board</a></li>
                        <li><a href="{{route('web.news-and-events')}}">News &amp; Events</a></li>
                        <li><a href="{{route('web.contact-us')}}">Contact Us</a></li>
                    </ul>
                    <span><i class="fa fa-bars pull-right menu-icon home_menu_bar"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>