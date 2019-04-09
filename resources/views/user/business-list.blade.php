@extends('user.main')
@section('content')

<!--breadcumb start here-->
<section class="banner-inner-sec" style="background-image: url({{ asset('assets/images/banner-slider/slider4.jpg')}});">
    <div class="banner-table">
        <div class="banner-table-cell">
            <div class="container">
                <div class="banner-inner-content">
                    <h2 class="banner-inner-title">Business Directory</h2>
                    <ul class="xs-breadcumb">
                        <li><a href="{{ URL::to('home')}}"> Home  / </a> Business Directory</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--breadcumb end here-->

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
.center-middle {
    display: block;
    margin-left: auto;
    margin-right: auto;
    width: 80%;
}
.color-balck {
    color: black;
}
.padding-zero {
    padding: 0px; 
}
.author-info-pmargin p {
    margin-bottom: 5px;
}
.mr-30 {
    margin-right: 30px;
}


.faq-content-collapse .btn-link 
{
    color: #008435;
    text-decoration: none;
    position: relative;
    display: block;
    width: 100%;
    text-align: left; 
}

.faq-content-collapse .btn-link:after 
{
    position: absolute;
    right: 20px;
    top: 9px;
    content: "\f068";
    font: normal normal normal 14px/1 FontAwesome;
    font-size: inherit;
    font-size: 14px;
    color: #2775c2;
    transition: all 500ms ease;
    -moz-transition: all 500ms ease;
    -webkit-transition: all 500ms ease;
    -ms-transition: all 500ms ease;
    -o-transition: all 500ms ease; 
}
.faq-content-collapse .btn-link.collapsed 
{
    color: #282828; 
}
.faq-content-collapse .btn-link.collapsed:after 
{
    content: "\f067";
    transition: all 500ms ease;
    -moz-transition: all 500ms ease;
    -webkit-transition: all 500ms ease;
    -ms-transition: all 500ms ease;
    -o-transition: all 500ms ease; 
}
.mb-10 {
    margin-bottom: 8px !important;
}

.detail-list-label {
    display: inline-block;
    width: 100px;
    font-weight: bold;
    vertical-align: top;
}
.detail-list-value {
    display: inline-block;
    vertical-align: top;
}
a {
  color: black;
}
</style>


<!-- start banner section -->
<section class="promo-area-sec">
    <div class="container">
        <div class="promo-content-item" style="background-image: linear-gradient(to bottom left, #0089e2, #000);">
            <form class="" id="formId"  action="{{ url('searchBusiness') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">                
                <div class="col-md-3 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="300ms">
                    <!-- <input class="form-control" type="search" placeholder="Search anything..."> -->
                </div>
                <div class="col-md-5 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="300ms">                        
                    <input type="text" name="keyword" class="form-control" placeholder="Search anything...">
                </div>
                <div class="col-md-2 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="300ms">
                    <a  id="search">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 483.083 483.083" style="enable-background:new 0 0 483.083 483.083;" xml:space="preserve" class="svg replaced-svg">
                            <path d="M332.74,315.35c30.883-33.433,50.15-78.2,50.15-127.5C382.89,84.433,298.74,0,195.04,0S7.19,84.433,7.19,187.85    S91.34,375.7,195.04,375.7c42.217,0,81.033-13.883,112.483-37.4l139.683,139.683c3.4,3.4,7.65,5.1,11.9,5.1s8.783-1.7,11.9-5.1    c6.517-6.517,6.517-17.283,0-24.083L332.74,315.35z M41.19,187.85C41.19,103.133,110.04,34,195.04,34    c84.717,0,153.85,68.85,153.85,153.85S280.04,341.7,195.04,341.7S41.19,272.567,41.19,187.85z"></path>
                        </svg>
                        <span>Search</span>
                    </a>
                </div>                
            </div>

            </form>
        </div>
    </div>
</section>
<!-- End banner section -->




<!-- start blog section -->
<section class="xs-blog-single-sec section-padding" style="padding-top: 0px;">
    <div class="container">
        <div class="row">
            
            <div class="col-lg-12">
                <div class="blog-content-item single-blog-details">

                    @foreach($business as $bus)
                    <div class="author-info-pmargin">
                        
                        <a href="{{ URL::to('overview', $bus->slug)}}">
                            <h4>{{ $bus->title }}</h4>
                        </a>

                        <div class="row">
                            <div class="col-lg-3">
                                <a href="{{ URL::to('overview', $bus->slug)}}">
                                    <img src="{{ asset($bus->img)}}" alt=""  style="width:100%;height:100%;">
                                </a>    
                            </div>
                            <div class="col-lg-9 padding-zero">
                                <p style="height:20px"><strong class="color-balck">  <label style="width:100px;">Category :</label> </strong> 
                                @for($i = 0; $i < count($bus->category_id) ;$i++)
                                    {{ ($i== count($bus->category_id) -1) ? $bus->category_id[$i]->name : $bus->category_id[$i]->name." & "}}
                                @endfor
                                </p>                                                                
                                        
                                <li>                                         
                                    <span class="detail-list-label">Address:</span>
                                    <span class="detail-list-value">
                                        <a href="http://maps.google.co.in/maps?q={{$bus->address}}"  target="_blank">
                                        {{$bus->address}} 
                                        </a>                                              
                                    </span>
                                </li>

                                <li>
                                    <span class="detail-list-label">Phone:</span>
                                    <span class="detail-list-value">
                                        {{ $bus->phone}} 
                                    </span>
                                </li>
                                @if(isset($bus->email))
                                <li>
                                    <span class="detail-list-label">Email:</span>
                                    <span class="detail-list-value color-blue">
                                        <a href="mailto:{{$bus->email}}" style="color:#007bff;"> {{ $bus->email}} </a>                                               
                                    </span>
                                </li>
                                @endif

                                @if(isset($bus->fax))
                                <li>
                                    <span class="detail-list-label">Fax :</span>
                                    <span class="detail-list-value">
                                        {{ $bus->fax}}  
                                    </span>
                                </li>
                                @endif


                                                                        
                                
                                @if(isset($bus->url))
                                <li>
                                    <span class="detail-list-label">Website :</span>
                                    <span class="detail-list-value">
                                        <a href="{{$bus->url}}"  target="_blank" style="color:#007bff;">
                                        {{ $bus->url}}  
                                        </a>
                                    </span>
                                </li>                                        
                                @endif

                                <!-- <div class="author-social">
                                    <span class="mr-30">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </span>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </div> -->
                            </div>


                            <div class="col-lg-12">
                                <p style="margin-top:10px;">                                    
                                    <!-- <strong class="color-balck"> About </strong> <br> -->
                                   
                                    @php
                                    {{
                                        echo $bus->description;
                                    }}                        
                                    @endphp

                                </p>
                            </div>
                        </div>
                    </div><!-- author info end -->
                    @endforeach
                </div>
            </div><!-- .col end -->


        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- End blog section -->

@stop

@section('script')
<script>    
    document.getElementById("search").onclick = function() {    
        document.getElementById("formId").submit();
    }
</script>
@stop