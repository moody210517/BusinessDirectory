@extends('user.main')
@section('content')


<style>
body { background-color:#fafafa;}
.content {
  text-align: center;
  margin-top:150px;
}
.content h1 {
  font-family: 'Sansita', sans-serif;
  letter-spacing: 1px;
  font-size: 50px;
  color: #282828;
  margin-bottom: 10px;
}
.content  i {
  color: #FFC107;
}
.content span {
  position: relative;
  display: inline-block;
}
.content  span:before, .content  span:after {
  position: absolute;
  content: "";
  background-color: #282828;
  width: 40px;
  height: 2px;
  top: 40%;
}
.content  span:before {
  left: -45px;
}
.content  span:after {
  right: -45px;
}
.content p {
  font-family: 'Open Sans', sans-serif;
  font-size: 18px;
  letter-spacing: 1px;
}
.wrapper {
  position: relative;
  display: inline-block;
  border: none;
  font-size: 14px;
  margin: 50px auto;
  left: 50%;
  transform: translateX(-50%);
}

.wrapper input {
  border: 0;
  width: 1px;
  height: 1px;
  overflow: hidden;
  position: absolute !important;
  clip: rect(1px 1px 1px 1px);
  clip: rect(1px, 1px, 1px, 1px);
  opacity: 0;
}

.wrapper label {
  position: relative;
  float: right;
  color: #C8C8C8;
}

.wrapper label:before {
  margin: 5px;
  content: "\f005";
  font-family: FontAwesome;
  display: inline-block;
  font-size: 1.5em;
  color: #ccc;
  -webkit-user-select: none;
  -moz-user-select: none;
  user-select: none;
}

.wrapper input:checked ~ label:before {
  color: #FFC107;
}

.wrapper label:hover ~ label:before {
  color: #ffdb70;
}

.wrapper label:hover:before {
  color: #FFC107;
}
</style>

<!--breadcumb start here-->
<!-- <section class="banner-inner-sec" style="background-image: url({{asset('assets/images/banner-slider/slider4.jpg')}});">
    <div class="banner-table">
        <div class="banner-table-cell">
            <div class="container">
                <div class="banner-inner-content">
                    <h2 class="banner-inner-title">Business Directory Overview</h2>
                    <ul class="xs-breadcumb">
                        <li><a href="{{ URL::to('home')}}"> Home  / </a> Business Directory Overview</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section> -->
<!--breadcumb end here-->


<!-- start blog section -->
<section class="xs-blog-single-sec section-padding" style="padding-top: 0px;margin-top: 64px;">
    <div class="container" style=" background:white; padding:10px;box-shadow: 0px 0px 1px 0px #50575e;">
        <div class="col-md-12 row">
            <div class="col-lg-8">
                <div class="blog-content-item single-blog-details">
                    <div class="single-blog-item single-blog-item-pmargin">
                        <h3 class="xs-blog-title" style="padding-top:30px;">
                            {{$business->first()?$business->title:''}}
                        </h3>
                        <!-- <p>
                            <a href="" class="mr-30 text-underline">Accommodations </a>
                            <a href="" class="text-underline">Conference & Meeting Rooms</a>
                        </p>
                         -->

                        <input type = "hidden" id="bid" value="{{$business->id}}" />

                        <div class="blog-post-img">

                            <section class="xs-banner-sec xs-banner-v2-sec owl-carousel banner-slider">
                                @if(count($business_images) > 1)
                                    @foreach($business_images as $img)
                                        <div class="banner-slider-item banner-item1" style = "height:100%;background: rgba(1, 0, 0, 1)">   
                                            <img  src="{{ asset($img->image) }} " alt="" style="width:100%;">                                 
                                        </div>                                          
                                    @endforeach    
                                @else
                                <img  src="{{ asset($business->img) }} " alt="" style="width:100%;">    
                                @endif
                                                                                   
                            </section>
                            
                        </div><!-- blog-post-img end -->

                        <p><strong class="color-balck"> Category : </strong> 
                                @for($i = 0; $i < count($business->category_id) ;$i++)
                                    {{ ($i== count($business->category_id) -1) ? $business->category_id[$i]->name : $business->category_id[$i]->name." & "}}
                                @endfor
                        </p>
                        <p style="height:20px"><strong class="color-balck"> Address : </strong> {{$business->address}}</p>
                        <p style="height:20px"><strong class="color-balck"> Phone : </strong> {{$business->phone }} </p>
                        
                        @if($business->email)
                            <p style="height:20px"><strong class="color-balck"> Email : </strong>  <a href="mailto:{{$business->email}}" style="color:#007bff"> {{ $business->email}} </a>  </p>
                        
                        @endif
                        @if($business->fax)
                            <p style="height:20px"><strong class="color-balck"> Fax : </strong>  {{$business->fax}}  </p>
                        @endif    
                        
                        @if($business->url)
                            <p style="height:20px"><strong class="color-balck"> Website : </strong> 
                            <a href="{{$business->url}}"  target="_blank" style="color:#007bff;"> {{ $business->url}}  </a> </p>
                        @endif
                                                
                        <span class="detail-list-label">Hours : </label> </span>  

                        @if(isset($business->time) && $business->time != "")                            
                            <span class="detail-list-value" style ="white-space: pre-line;" > {{$business->time}} </span>
                        @else

                            @for($i = 0; $i < count($business->hour_id) ;$i++)    
                                <p style="height:20px">                                
                                {{ date("g:i a", strtotime($business->hour_id[$i]->start_time))." - ".date("g:i a", strtotime($business->hour_id[$i]->end_time))."  "}}
                                @switch($business->hour_id[$i]->week_of_day)
                                    @case(1)
                                        Monday
                                        @break
                                    @case(2)
                                        Tuesday
                                        @break
                                    @case(3)
                                        Wendesday
                                        @break
                                    @case(4)
                                        Thursday
                                        @break
                                    @case(5)
                                        Friday
                                        @break
                                    @case(6)
                                        Saturday
                                        @break
                                    @case(7)
                                        Sunday
                                        @break                                    
                                    @default
                                        <span>Something went wrong, please try again</span>
                                @endswitch
                                
                                <p>
                            @endfor    
                            
                        @endif

                                             
                        <br>
                       <strong class="color-balck"> About </strong> <br>
                       @php
                       {{
                        echo $business->description;
                       }}                        
                       @endphp
                        

                        @if( ($business) && $business->video != "")
                            @if( strpos($business->video , 'http') !== false)                            
                                <iframe type='text/html' src='{{ $business->video }}' width='100%' height='350' frameborder='0' allowfullscreen='true'></iframe>
                            @else
                                <iframe type='text/html' src='http://www.youtube.com/embed/{{ $business->video }}' width='100%' height='350' frameborder='0' allowfullscreen='true'></iframe>
                            @endif
                            
                        @endif
                                                                        
                    </div><!-- single-blog-item end -->


                                 
                               
                    <div class="widget">
                        <h4 class="">
                             <span class="light-text">Trending</span> posts
                        </h4>
                        <div class="widget-posts">
                            <div class="widget-post">
                                @foreach($trending as $tr)
                                <a href="{{ URL::to('businessDirectoryOverview', $tr->id)}}"> <img src="{{ asset($tr->img) }}" style="width:140px;height:100px;margin-top:3px;"> </a>
                                @endforeach
                            </div><!-- .widget-post END -->
                        </div><!-- .widget-posts END -->
                    </div><!-- .widget end -->  



                    

                    <div class="post-tag-item clearfix">
                        <div class="social-share-list float-right">
                            <h4 class="tag-title">Share on</h4>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </div>
                    </div><!-- post-tag-item end -->
                </div>
            </div><!-- .col end -->
            
            
            <div class="col-lg-4">
                <div class="sidebar-widgets">
                    

                    <button  class="xs-btn sm-btn" style="width: 100%; margin-top:20px;" data-toggle="modal" data-target="#mb-3-b"> Click here to see Advertisement </button>

                    <div class="widget">
                        <div class="widget-posts">
                            <div class="widget-post">

                                <div class="pb-20  border-b-1">
                                    <div class="stars-font-size text-center">
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                    <p class="text-center"> Be the first to review this item! </p>
                                    <div class="text-center">
                                        <a href="#"  onclick="rate()"  class="xs-btn sm-btn" style="width: 100%;">Rate It</a>
                                    </div>
                                </div>

                                <div class=" border-b-0">
                                    <!-- <h5 class="mt-20 text-center">
                                        Contact 
                                    </h5> -->
                                    <!-- <h3 class="text-center"> <a href="">  {{$business->phone}} </a> </h3>
                                     -->
                                    <div class="text-center">
                                        <a href="mailto:{{$business->email}}" class="xs-btn sm-btn" style="width: 100%;">Send E-mail</a>
                                    </div>
                                </div>

                                <!-- <h5 class="mt-20 text-center">
                                    Bookmarking 
                                </h5> -->

                                
                                
                                @if(Session::has('user_id')) 
                                    <input type = "hidden" id="userId" value="{{ Session::get('user_id') }}" />
                                @else
                                    <input type = "hidden" id="userId" value="0" />
                                @endif
                                
                                
                                <input type = "hidden" id="bookmark" value=" {{$business->bookmark}}" />
                                

                                <div class=" border-b-0">
                                <div class="text-center" style="margin-top:10px;">                                    
                                    <a href="#" class="xs-btn sm-btn" onclick="bookmark()" style="width: 100%;" id="bookmarkedTitle"> <i class="fa fa-bookmark-o"></i> &nbsp; Bookmarked</a>
                                    <a href="#" class="xs-btn sm-btn" onclick="bookmark()" style="width: 100%;" id="bookmarkTitle"> <i class="fa fa-bookmark-o"></i> &nbsp; Bookmark this</a>                                                                        
                                </div>
                                </div>

                            </div><!-- .widget-post END -->
                        </div><!-- .widget-posts END -->
                    </div><!-- .widget end -->                            


                                                   
                    @if($business->facebook)
                    <div class="widget" style="margin-top: -10px">
                        <div class="widget-posts">
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F{{$business->facebook}}&tabs=timeline&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="300" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media" style="width:100%;height:100%"></iframe>
                            <!--  How To Implementation It
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F You have to Add client facebook page ID Here  &tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe> -->
                        </div><!-- .widget-posts END -->
                    </div><!-- .widget end -->     
                    @endif                    

                    @if($business->twitter)
                        <div class="widget social-feed-twitter" style="margin-top: -10px">                    
                            <div class="widget-posts"> 
                                <a class="twitter-timeline" href="https://twitter.com/{{$business->twitter}}?ref_src=twsrc%5Etfw">Tweets by TwitterDev</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </div>
                        </div>
                    @endif
                                     
                    @if($business->instagram)
                        <div class="widget" style="margin-top: -10px">
                            <div class="widget-posts">
                                <!-- InstaWidget -->
                                    <a href="https://instawidget.net/v/user/{{$business->instagram}}" id="link-a95ea422a31148659ed6f1ea83ea84720e7942fc7b4f4811f88505372a865bbe">{{$business->instagram}}</a>
                                    <script src="https://instawidget.net/js/instawidget.js?u=a95ea422a31148659ed6f1ea83ea84720e7942fc7b4f4811f88505372a865bbe&width=300px"></script>
                            </div>
                        </div>
                    @endif
                    
                    
                    
                    </div>
                </div><!-- .sidebar-widgets end -->
            </div><!-- .col end -->

        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- End blog section -->
    

<div id="mb-3-b" class="modal bg-dark" data-backdrop="false">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        
        <h5 class="modal-title">Advertisement  </h5>
        </div>
        
        <div class="modal-body text-center p-lg">
            <img src="{{ asset($business->ad_img) }}" />
        </div>       

        <div class="modal-footer">
        <!-- <button type="button" class="btn btn-white" data-dismiss="modal">No</button> -->
        <button type="button" class="btn btn-primary" data-dismiss="modal"> Back</button>
        </div>
    </div><!-- /.modal-content -->
    </div>
</div>


 <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #2775c2;">
                <h4 class="modal-title" style="color: #fff;"> Log In </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                
                <button class="xs-btn sm-btn" onclick="createAccount()">Create Your Account </button>   


                    <p style="margin-top: 10px;">
                        or if you already have an account login below
                    </p>
                    <!-- <button class="xs-btn sm-btn"><i class="fa fa-facebook-official"></i> Log in with Facebook </button>    -->
                </div>
                <div class="text-center">                
                    <p style="margin-top: 40px;">
                        or log in using your email address
                    </p>
                    <form class="form-horizontal" action="{{ url('access') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                        </div>
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember"> Sign me in automatically</label>
                        </div>
                        <p style="margin-top: 20px;">
                            By signing up, you agree to our Terms of Service and Privacy Policy.
                        </p>
                        <button type="submit" class="xs-btn sm-btn"> Log In </button>   
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div> 
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="rateModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #2775c2;">
                <h4 class="modal-title" style="color: #fff;"> Rate It </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">

                 <div class="wrapper">
                    <input type="checkbox" id="str1" name="str1" onClick="show(1);" value="1" />
                    <label for="str1"></label>
                    <input type="checkbox" id="str2" name="str2" onClick="show(2);" value="2" />
                    <label for="str2"></label>
                    <input type="checkbox" id="str3" name="str3" onClick="show(3);" value="3" />
                    <label for="str3"></label>
                    <input type="checkbox" id="str4" name="str4" onClick="show(4);" value="4" />
                    <label for="str4"></label>
                    <input type="checkbox" id="str5" name="str5" onClick="show(5);"  value="5" />
                    <label for="str5"></label>
                </div>
                

                

                <div class="text-center">                
                   
                    <form class="form-horizontal" action="{{ url('rate') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden"  id="star" name="star" value="1"/>
                        <input type = "hidden" name="bid" value="{{$business->id}}" />

                        <div class="form-group">
                            <input type="text" class="form-control" id="rate_name" placeholder="Name" name="rate_name" required="required">
                        </div>

                        <div class="form-group">
                            <input type="email" class="form-control" id="rate_email" placeholder="Email" name="rate_email"  required="required">
                        </div>
                       
                        <div class="form-group">
                            <textarea type="text" class="form-control" id="rate_comment" placeholder="Commnent" name="rate_comment" required="required"></textarea>
                        </div>
                        
                        <!-- <p style="margin-top: 20px;">
                            By signing up, you agree to our Terms of Service and Privacy Policy.
                        </p> -->
                        <button type="submit" class="xs-btn sm-btn"> Submit </button>   
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div> 
    </div>
</div>


@stop

@section('script')

<script>


    $( document ).ready(function() {
        var bookmark = document.getElementById("bookmark").value;
        if(bookmark == 1){
            $("#bookmarkTitle").hide();
            $("#bookmarkedTitle").show();            
        }else if(bookmark == 0){
            $("#bookmarkTitle").show();
            $("#bookmarkedTitle").hide();
        }
 
    });


    function show(star){

        $('input[name=str5]').attr('checked', false);
        $('input[name=str4]').attr('checked', false);
        $('input[name=str3]').attr('checked', false);
        $('input[name=str2]').attr('checked', false);
        $('input[name=str1]').attr('checked', false);
        
        document.getElementById("star").value = star;

        if(star == 5){
            $('input[name=str5]').attr('checked', true);        
        }else if(star == 4){
            $('input[name=str4]').attr('checked', true);
        }else if(star == 3){
            $('input[name=str3]').attr('checked', true);
        }else if(star == 2){
            $('input[name=str2]').attr('checked', true);
        }else if(star == 1){
            $('input[name=str1]').attr('checked', true);
        }
    }

    function createAccount(){  
        var id = document.getElementById("bid").value;
        window.location="{{URL::to('register')}}" +"/" +  id;
    }

    function rate(){
        $('#rateModal').modal('show');        
    }

    function bookmark(){
        var userId = document.getElementById("userId").value;
        var bid = document.getElementById("bid").value;
        var bookmark = document.getElementById("bookmark").value;
        if(userId == 0){            
            $('#myModal').modal('show');
        }else{
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });
            
                $.ajax({ 
                type: 'POST',
                data: { userId:userId, bid:bid, bookmark:bookmark},
                url: "{{ URL::to('bookmark')}}",
                success: function(result) {     
                        var res = result.results;               
                        if(res == 200){
                            document.getElementById("bookmark").value = "1";
                            $("#bookmarkTitle").hide();
                            $("#bookmarkedTitle").show();
                        }else if(res == 300){
                            document.getElementById("bookmark").value = "0";
                            $("#bookmarkTitle").show();
                            $("#bookmarkedTitle").hide();                            
                        }
                }        
                });                
        }
    }

</script>
@stop