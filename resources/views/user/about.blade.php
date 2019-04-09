@extends('user.main')
@section('content')

<!--breadcumb start here-->
<!-- <section class="banner-inner-sec" style="background-image: url(assets/images/banner-slider/slider4.jpg);">
    <div class="banner-table">
        <div class="banner-table-cell">
            <div class="container">
                <div class="banner-inner-content">
                    <h2 class="banner-inner-title">About Us</h2>
                    <ul class="xs-breadcumb">
                        <li><a href="{{ URL::to('home')}}"> Home  / </a> About Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--breadcumb end here-->



<style type="text/css">
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}
.color-balck {
    color: black;
}
</style>



<section class="tips-tricks-sec" style="padding-top: 40px;padding-bottom: 40px;margin-top: 64px;">
    <div class="container">
        <div class="row">
            <section class="xs-banner-sec xs-banner-v2-sec owl-carousel banner-slider">
                @if(count($images) > 0)
                    @foreach($images as $img)
                        <div class="banner-slider-item banner-item1" style = "height:150px; background: rgba(1, 0, 0, 1)">   
                            <img  src="{{ asset($img->image) }} " alt="" style="width:100%;">                                 
                        </div>                                          
                    @endforeach    
                @endif
                  
            </section>                    
        </div>
    </div>
</section>



<!-- header about inner section -->
<section class="about-inner section-padding" style="padding-top: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="300ms">
                <div class="about-inner-img">
                    <img src="assets/images/about/directory.png" alt="">
                </div>
            </div><!-- col end -->
            <div class="col-lg-6 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="400ms">
                <div class="about-inner-content">
                    <h2 class="column-title2 column-title">About our Company</h2>
                   <div class="single-about-content">
                        <p>
                            We are a user-friendly online & print Community Directory that is independently produced. Our objective is to help provide increased awareness and patronization of local products and services. Helping businesses and communities grow.
                        </p>
                   </div>
                   <div class="row about-funfact">
                       <div class="col-sm-4">
                            <div class="single-about-funfact">
                                <i class="fa fa-certificate"></i>
                                <h4 class="funfact-title" data-counter="25">25 +</h4>
                                <p>year of experience</p>
                            </div>
                       </div>
                       <div class="col-sm-4">
                            <div class="single-about-funfact">
                                <i class="fa fa-users"></i>
                                <h4 class="funfact-title" data-counter="502">502 +</h4>
                                <p>happy customers</p>
                            </div>
                       </div>
                       <div class="col-sm-4">
                            <div class="single-about-funfact">
                                <i class="fa fa-trophy"></i>
                                <h4 class="funfact-title" data-counter="100">100</h4>
                                <p>professional awards</p>
                            </div>
                       </div>
                   </div>
                </div>
            </div><!-- col end -->
        </div><!-- row end-->
    </div><!-- .container end -->
</section><!-- End about inner section -->




<!-- header why choose us section -->
<section class="why-choose-us-sec why-choose-inner section-padding section-bg-v2">
    <div class="container">
        <div class="row">
        <div class="col-lg-9 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="400ms">
                <div class="why-choose-content">
                    <h2 class="column-title2 column-title">Why Choose Us</h2>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="single-why-choose-list">
                                <i class="fa fa-certificate"></i> 
                                <h3>We are ISO certifide</h3>
                                <p>Be, brought first whales he signs thing our give were all fowl sea upon make called face together.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-why-choose-list">
                                <i class="fa fa-life-ring"></i> 
                                <h3>Best support</h3>
                                <p>Be, brought first whales he signs thing our give were all fowl sea upon make  called face together.</p>
                        </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-why-choose-list">
                                 <i class="fa fa-users"></i> 
                                <h3>Expert team members</h3>
                                <p>Be, brought first whales he signs thing our give were all fowl sea upon make  called face together.</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-why-choose-list">
                                 <i class="fa fa-money"></i>
                                <h3>No hidden cost</h3>
                                <p>Be, brought first whales he signs thing our give were all fowl sea upon make  called face together.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 align-self-center wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="500ms">
                <div class="why-choose-inner-img">
                    <img src="assets/images/about/about01.jpg" alt="">
                </div>
            </div>
            
        </div><!-- row end-->
    </div><!-- .container end -->
</section><!-- End why choose us section -->



<!-- header ready to contact section -->
<section class="ready-to-contact section-padding">
    <div class="container">
       <div class="col-lg-8 offset-lg-2">
           <div class="ready-to-contact-content">
               <h2>Are you ready to take our Business Directory?</h2>
               <p>Be brought first whales he signs thing our give were all fowl sea upon make firmament called face, together. 
                   I third deep days fifth spirit you're is you're saw bearing 
                </p>
                <a href="{{ URL::to('contactUs')}}" class="xs-btn fill">CONTACT US</a>
           </div>
       </div>
    </div><!-- .container end -->
</section><!-- End ready to contact section -->
 
                        











@stop