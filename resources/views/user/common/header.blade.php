<meta name="csrf-token" content="{{ csrf_token() }}">

<div id="preloader">
    <div class="preloader-wrapper">
        <div class="la-ball-clip-rotate-pulse la-2x">
            <div></div>
            <div></div>
        </div>
    </div>
    <a href="#" class="cancel-preloader">Cancel Preloader</a>
</div>	<!-- END prelaoder -->

<!-- header middle section -->
<section class="xs-header-middle header-v2-top">

    <div class="container">
        <div class="row">
            <div class="col-md-9 align-self-center">

                <div class="logo">
                    <a href="{{ URL::to('home')}}">
                        <h3 class="text-center">
                            <img src="{{ asset('assets/images/Bluelogo1.jpg') }}" alt="" style="height: 80px;width: 60px;">
                            &nbsp; &nbsp; Blue Spruce Directory                             
                        </h3>                       
                    </a>
                </div>
               
            </div>
            <div class="col-md-3 align-self-center">
                <a href="#" class="xs-btn sm-btn" onclick="window.print()">
                         Online & Print
                    </a>
                    <!-- <i class="fa fa-print"></i> -->
                </a>
            </div>
            
        
    </div><!-- .container end -->
</section><!-- End header middle section -->

<!-- header nav section -->
<header class="xs-header-nav xs-heder-nav-v2">
    <div class="">
        <div class="row  menu-item">
            <div class="col-lg-12">
                <nav id="navigation1" class="navigation header-nav clearfix">
                    <div class="nav-header">
                        <a href="{{ URL::to('home')}}" class="mobile-logo">
                          
                            <h4 style="color: #fff;" style="margin-left:10px;">                       
                            <img src="{{ asset('assets/images/Bluelogo1.jpg') }}" style="height: 80px;width: 60px;">         
                                &nbsp; &nbsp; Blue Spruce Directory 
                            </h4>
                        </a>
                        <div class="nav-toggle"></div>
                    </div>
                    <div class="nav-menus-wrapper container clearfix">
                        <ul class="nav-menu">
                            <li  class="{!! Request::is('home') ? 'focus' : '' !!}"><a href="{{ URL::to('home')}}">Home</a></li>                            
                            @if(Session::has('directory_id')) 
                            <li class="{!! Request::is('businessDirectory/*') ? 'focus' : '' !!}"><a href="{{ URL::to('businessDirectory')}}">Business Directory</a></li>
                            @endif
                            
                            @if(Session::has('directory_id')) 
                                <li><a href="#">Accommodations</a>
                                    <ul class="nav-dropdown">
                                        <li><a href="{{ url('businessCatNameLists', ['Accommodation','']) }}">All Accommodations</a> </li>
                                        <li><a href="{{ url('businessCatNameLists', ['Hotel','Motel']) }}">Hotel & Motel</a> </li>
                                        <li><a href="{{ url('businessCatNameLists', ['Bed','Breakfast']) }}">Bed & Breakfast</a> </li>
                                        <li><a href="{{ url('businessCatNameLists', ['Parks','Campgrounds']) }}">RV Parks & Campgrounds</a> </li>
                                    </ul>
                                </li>                       
                            @endif
                            
                            @if(Session::has('directory_id')) 
                            <li><a href="#">Restaurants</a>
                                <ul class="nav-dropdown">
                                    <li><a href="{{ url('businessCatNameLists', ['Eateries','']) }}">All Eateries</a></li>
                                    <li><a href="{{ url('businessCatNameLists', ['Dining','']) }}">Family Dining</a></li>
                                    <li><a href="{{ url('businessCatNameLists', ['Café','Shop']) }}">Café & Tea Shop</a></li>
                                    <li><a href="{{ url('businessCatNameLists', ['Lounges','Bars']) }}">Lounges & Bars</a></li>
                                    <li><a href="{{ url('businessCatNameLists', ['Food','']) }}">Fast Food</a></li>
                                    <li><a href="{{ url('businessCatNameLists', ['Groceries','Snacks']) }}">Groceries & Snacks</a></li>
                                </ul>
                            </li>
                            @endif

                            @if(Session::has('directory_id')) 
                            <li><a href="{{ URL::to('event')}}">Events</a></li>
                            @endif

                            @if(Session::has('directory_id')) 
                            <li><a href="#">Community</a>
                                <ul class="nav-dropdown">
                                    <li><a href="{{ url('businessCatNameLists', ['Halls','Rental Facilities']) }}">Halls & Rental Facilities</a></li>
                                    <li><a href="{{ url('businessCatNameLists', ['community','Churches']) }}">Churches</a></li>
                                    <li><a href="{{ url('businessCatNameLists', ['Community','Services']) }}">Community Services</a></li>
                                    <li><a href="{{ url('businessCatNameLists', ['Sports','Recreation']) }}">Sports & Recreation</a>
                                        <!-- <ul class="nav-dropdown">
                                            <li><a href="{{ url('businessCatNameLists', ['Sports','Indoor']) }}">Indoor</a></li>
                                            <li><a href="{{ url('businessCatNameLists', ['Sports','Outdoors']) }}">Outdoors</a></li>
                                        </ul> -->
                                    </li>
                                </ul>
                            </li>
                            @endif
                                                        
                            
                            <li><a href="{{ URL::to('aboutUs')}}">About Us</a></li>
                            <li><a href="{{ URL::to('contactUs')}}">Contact</a></li>
                            
                            @if(Session::has('user_id')) 
                                <li><a href="{{ URL::to('home/logout')}}">Logout</a></li>
                            @endif
                        </ul>
                    </div>

                </nav>
            </div>
        </div><!-- .row end -->
    </div><!-- .container end -->
</header><!-- End header nav section -->