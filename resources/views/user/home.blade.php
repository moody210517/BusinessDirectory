@extends('user.main')
@section('content')

<!-- start banner section -->
<!-- <section class="xs-banner-sec xs-banner-v2-sec owl-carousel banner-slider">
    <div class="banner-slider-item banner-item1" style="background-image: url(assets/images/banner-slider/slider6.jpg);">
        <div class="slider-table">
            <div class="slider-table-cell">
                <div class="container">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="banner-content text-center">
                            <h2>Blue Spruce Directory</h2>
                            <p>Wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring
                                whole heart.
                            </p>
                            <div class="xs-btn-wraper">
                                <a href="#" class="xs-btn fill">
                                    Online & Print
                                </a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-slider-item banner-item2" style="background-image: url(assets/images/banner-slider/slider4.jpg);">
        <div class="slider-table">
            <div class="slider-table-cell">
                <div class="container">
                    <div class="col-lg-9">
                        <div class="banner-content">
                            <h2>Restaurants</h2>
                            <p>Wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring
                                whole heart.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="banner-slider-item banner-item3" style="background-image: url(assets/images/banner-slider/slider5.jpg);">
        <div class="slider-table">
            <div class="slider-table-cell">
                <div class="container">
                    <div class="col-lg-8 offset-lg-4">
                        <div class="banner-content text-right">
                            <h2>Accommodations</h2>
                            <p>Wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring
                                whole heart.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<style type="text/css">
.promo-content-item a {
    text-decoration: none;
    padding: 15px 20px 15px 43px;
    display: inline-block;
    font-size: 14px;
    letter-spacing: .5px;
    position: relative;
    line-height: 1;
    font-family: 'Poppins';
    color: #fff !important;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}
.promo-content-item a {
    background-color: #0089e2;
}
.promo-content-item a .svg {
    position: absolute;
    left: 20px;
    top: 50%;
    margin-top: -7px;
}
img.svg, .svg, svg {
    width: 14px;
    height: 14px;
    fill: currentcolor;
}
.promo-content-item a {
    text-decoration: none;
    padding: 15px 20px 15px 43px;
    display: inline-block;
    font-size: 14px;
    letter-spacing: .5px;
    position: relative;
    line-height: 1;
    font-family: 'Poppins';
    color: #fff !important;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
}
.footer-bottom-menu {
    text-align: center;
    margin-top: 15px;
}
.footer-bottom-menu li {
    display: inline;
    margin: 0 15px; 
}
.footer-bottom-menu li a {
    color: #666;
}
.center {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 50%;
}
.tips-tricks-item p {
    color: #fff;
    font-weight: 600;
    margin-bottom: 0px;
}

</style>


<!-- start banner section -->
<!-- <section class="promo-area-sec">
    <div class="container">
        <div class="promo-content-item" style="background-image: linear-gradient(to bottom left, #0089e2, #000);">
            <div class="row">
                
                <div class="col-md-5 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="300ms">
                    <input class="form-control" type="search" placeholder="Search anything...">
                </div>
                <div class="col-md-5 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="300ms">                        
                    <input type="text" class="form-control" placeholder="Location">
                </div>
                <div class="col-md-2 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="300ms">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 483.083 483.083" style="enable-background:new 0 0 483.083 483.083;" xml:space="preserve" class="svg replaced-svg">
                            <path d="M332.74,315.35c30.883-33.433,50.15-78.2,50.15-127.5C382.89,84.433,298.74,0,195.04,0S7.19,84.433,7.19,187.85    S91.34,375.7,195.04,375.7c42.217,0,81.033-13.883,112.483-37.4l139.683,139.683c3.4,3.4,7.65,5.1,11.9,5.1s8.783-1.7,11.9-5.1    c6.517-6.517,6.517-17.283,0-24.083L332.74,315.35z M41.19,187.85C41.19,103.133,110.04,34,195.04,34    c84.717,0,153.85,68.85,153.85,153.85S280.04,341.7,195.04,341.7S41.19,272.567,41.19,187.85z"></path>
                        </svg>
                        <span>Search</span>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
</section> -->
<!-- End banner section -->

<section class="tips-tricks-sec" style="padding-top: 40px;padding-bottom: 40px;margin-top: 64px;">
    <div class="container">
        
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
</section>

<!-- start tips and tricks section -->
<section class="tips-tricks-sec section-padding" style="padding-top: 0px;">
    <div class="container">
       
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-item section-title-v2-item">
                    <h2 class="section-title">
                        <span class="xs-title">Business Directory</span>
                        <em>Directories</em>
                    </h2>
                    <h3 class="hidden-title">directories</h3>
                </div>
            </div>
        </div><!-- row end-->

        <div class="row">
            <div class="col-lg-3 col-md-6"> </div> 
            
            @foreach($directories as $dir)           
            <div class="col-lg-3 col-md-6">
                <a href="{{ url('businessDirectory', $dir->title)}}">
                <div class="single-tips-tricks tips-tricks-item" style="margin-left:10px;margin-right:10px;">
                    <img src="{{ asset($dir->img) }}" alt="" style="z-index:-1;" id="image" />
                    <div class="tips-tricks-content">
                        <!-- <span>24 jan, 2018</span> -->
                        <!-- <p> {{ $dir->desc }} </p>                          -->
                        <!-- <h3>Moving good spirit</h3> -->
                    </div>
                    <!-- <div class="tag-line">{{$dir->title}}</div>                    -->
                </div>
                 <div class=""> <p> <h6> {{ $dir->desc }} </h6></p> </div>
                </a>
            </div>
            @endforeach
            
            <!-- <div class="col-lg-3 col-md-6">
                <div class="single-tips-tricks tips-tricks-item">
                    <img src="{{ asset('assets/images/tips2.png') }}" alt="">
                    <div class="tag-line">Alberta</div>
                </div>
            </div> -->
        </div>
    </div><!-- .container end -->
</section><!-- End tips and tricks section -->

@stop


@section('script')
<!-- <script type="text/javascript">
        $( document ).ready(function() {
            var yourImg = document.getElementById('image');
            if(yourImg && yourImg.style) {
                var currentWidth = yourImg.width;
                yourImg.style.height = currentWidth * 558 / 893;
                
            }
        });        
</script> -->
@stop