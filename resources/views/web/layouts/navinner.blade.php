<!---- Phone View menu -->
<div class="bg-img">
    <div class="mob-nav">
        <p class="close-btn"><i class="fa fa-close"></i></p>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about-us.php" target="top">About Us</a></li>
            <li><a href="editorial-boards.php">Editorial Board</a></li>
            <li><a href="news-and-events.php">News &amp; Events</a></li>
            <li><a href="contact.php">Contact Us</a></li>
        </ul>
    </div>
</div> 
<!---- //Phone View menu-->  

<div class="col-md-12 col-sm-12 col-xs-12 header-menu inner-navigation">
    <div class="container">
        <div class="row">
            <div class="menu-nav col-xs-12 col-sm-12 col-md-12">
                <div class="col-md-2 col-sm-2 col-xs-4 logo"><a href="{{route('web.home')}}" alt=""><img src="{{asset('web/images/Main-logo-footer.png')}}" alt="logo" /></a></div>
                <div class="col-md-10 col-sm-10 col-xs-8 menu">
                    <ul class="navigation inner_nav">
                        <li style="border-left:0px;"><a href="{{route('web.home')}}">Home</a></li>
                        <li class="about-menu"><a href="{{route('web.about-us')}}">About Us <i class="fa fa-angle-down"></i></a>
                            <ul class="sub-ul">
                                <li><a href="{{route('web.leadership')}}">Leadership</a></li>
                                <li><a href="{{route('web.ined-library')}}">INED Library</a></li>
                                </ul>
                        </li>
                        <li><a href="{{route('web.all-editorial')}}">Editorial Board</a></li>
                        <li><a href="{{route('web.news-and-events')}}">News &amp; Events</a></li>
                        <li><a href="{{route('web.contact-us')}}">Contact Us</a></li>
                         <li>
                            <?php if(isset(session()->all()['userId']) && session()->all()['userId']>0 ){?>
                                <a href="log-out">Log Out</a><br>
                                <span style="color:black">{{session()->all()['userName']}}</span>
                            <?php } else { ?>
                            <a href="sign-in">Sign In | </a>
                            <a href="sign-up">Sign Up </a>
                            <?php } ?>
                        </li>
                    </ul>
                    <span><i class="fa fa-bars pull-right menu-icon"></i></span>
                </div>
            </div>
        </div>
    </div>
</div>