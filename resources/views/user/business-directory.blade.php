@extends('user.main')
@section('content')


<style type="text/css">
/* .fa {
    width: 100px !important;
    height: 100px !important;
    background:orange;
} */
.fa fa-facebook{
    width: 100px !important;
    height: 100px !important;
    background:orange;
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

<input text="hidden" value="{{$categoryId}}" id="categoryId"/>
<!-- start banner section -->
<section class="promo-area-sec" style="margin-top: 64px;">
    <div class="container">
        <div class="promo-content-item" style="background-image: linear-gradient(to bottom left, #0089e2, #000);margin-top: 0;">
            <form class="" id="formId" action="{{ url('searchBusiness') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">                                
                    <div class="col-md-3 wow fadeInUp" data-wow-duration="1.5s" data-wow-delay="300ms">
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

 <section class="tips-tricks-sec" style="padding-bottom: 0px;">
    <div class="container">
        <div class="section-panel-footer"> 
            <div class="row">
                <div class="col-md-7">
                    <h3 class="faq-title">
                        <span class="light-text">Listings in</span>
                        @foreach($categories as $category)
                            @if($categoryId == $category->id)
                                {{$category->name}}
                            @endif                                              
                        @endforeach
                    </h3>
                </div>
                <div class="col-md-5 text-right">
                    <div class="btn-group btn-group-sm">
                        <a href="#" class="xs-btn sm-btn" onclick="onClickListView()" style="margin-right: 5px;">
                            <i class="fa fa-list"></i> List View
                        </a>
                        <a href="#" class="xs-btn sm-btn" onclick="onClickMapView()">
                            <i class="fa fa-street-view"></i> Map View
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="row" style="display: none;">
                <div class="col-md-12">
                    <div class="pull-right heading-feedback mt-10" id="share">
                      
                        <li style="display: inline;">
                            <a href="javascript:void(0);" ><i class="my-icon fa fa-bookmark-o"></i> &nbsp; Share & Bookmark </a> 
                            <ul id="myDIV" class="nav-dropdown nav-dropdown-menu social-icons" style="border: 1px solid #ccc;">
                                <li>
                                    <a href="#" onclick="facebook("")">
                                        <i class="fa fa-facebook"><span style="margin-left: 20px;"> Facebook </span></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" onclick="twitter("")">
                                        <i class="fa fa-twitter"><span style="margin-left: 20px;"> Twitter </span></i>
                                    </a>
                                </li>
                                <li>

                                <a href="#" onclick="googleOpen("")">
                                    <i class="fa fa-google-plus"><span style="margin-left: 20px;"> Google Plus </span></i>
                                </a>

                                </li>
                            </ul>
                        </li>                                           
                        <a href="#" onclick="printElem()" > <i class="fa fa-print"></i> &nbsp; Print </a>        
                    </div>
                    
                </div> 

            </div>


            
        </div>
    </div>
</section>




<!-- start blog section -->
<section class="xs-blog-single-sec section-padding" style="padding-top: 10px;">
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="sidebar-widgets" id="accordion">
                    <div class="widget widget-categories faq-content-collapse" id="headingOne" style="background: #195581;">
                        <h5 class="widget-title btn-link mb-10" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span class="light-text"> </span> Categories
                        </h5>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" style="margin-top:15px;">
                            <ul class="list-group collapse show" id="collapseOne" aria-labelledby="headingOne">                               
                                @foreach($categories as $category)
                                <li>
                                    <a href="{{ url('businessCatLists', $category->id) }}" style="{{ $categoryId == $category->id ? 'color:blue;':''}}">{{$category->name}}</a>
                                    <span></span>
                                </li>
                                @endforeach                                
                                <!-- <a href="javascript:void(0);" id="viewALL" onclick="appendCategoryList()" class="text-center"> View All </a> -->
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
                                    
                                    
            <div class="col-md-9" >
                <div class="blog-content-item single-blog-details single-list-view" id="divBusiness">
                    @foreach($business as $bus)
                    <div class="author-info-pmargin" id="div{{$bus->id}}">
                        <a href="{{ URL::to('overview', $bus->slug)}}">
                            <h3>{{ $bus->title }}</h3>
                        </a>
                        <div class="row" style="margin: 0px;">
                            <div class="col-md-4">
                                <a href="{{ URL::to('overview', $bus->slug)}}">
                                    <img src="{{ asset($bus->img)}}" alt="" style="width:100%; height:210px;">
                                </a>    
                            </div>
                            <div class="col-md-6 padding-zero-letf single-business-item">
                                <div class="row">                                                                    
                                    <div class="col-md-12">
                                        <p><strong class="color-balck"> Category : </strong> 
                                        @for($i = 0; $i < count($bus->category_id) ;$i++)
                                            {{ ($i== count($bus->category_id) -1) ? $bus->category_id[$i]->name : $bus->category_id[$i]->name." & "}}
                                        @endfor
                                        </p>
                                                                                
                                        <!-- <p style=" margin-top: 0em; margin-bottom: 0em;"><strong class="color-balck" > <label style="width:100px;height:15px;"></label> </strong> <span class="color-orange"></span> </p> -->
                                 
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
                                                @php
                                                {{ 
                                                    $phones = explode("&",$bus->phone); 
                                                    $i = 0;
                                                    foreach($phones as $phone){
                                                        if($i != 0)                                                            
                                                            echo '<span class="detail-list-value" style="margin-left:105px;">'.$phone.'</span><br>'; 
                                                        else
                                                            echo '<span class="detail-list-value">'.$phone.'</span><br>';                                                         
                                                        $i++;   
                                                    }                                                                                                    
                                                }} 
                                                @endphp                                                                                            
                                        </li>
                                        @if(isset($bus->email))
                                        <li>
                                            <span class="detail-list-label">Email:</span>
                                            <span class="detail-list-value">
                                                <a href="mailto:{{$bus->email}}" style="color:#007bff"> {{ $bus->email}} </a>                                               
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
                                        <span class="detail-list-label">Hours : </label> </span>  

                                        @if(isset($bus->time) && $bus->time != "")
                                            <span class="detail-list-value" style ="white-space: pre-line;" > {{$bus->time}} </span>
                                        @else
                                            @for($i = 0; $i < count($bus->hour_id) ;$i++)   
                                                @if($i != 0)
                                                <span class="detail-list-value" style="margin-left:105px;">
                                                @endif
                                                
                                                @switch($bus->hour_id[$i]->week_of_day)
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
                                                &nbsp;&nbsp;
                                                {{ "   ". date("g:i a", strtotime($bus->hour_id[$i]->start_time))." - ".date("g:i a", strtotime($bus->hour_id[$i]->end_time))."  "}}


                                                @if($i == 0)
                                                </span>
                                                @else
                                                </span>
                                                @endif
                                                
                                            @endfor  

                                        @endif
    
                                                                                  
                                           
                                      
                                    </div>
                                </div>
                            </div>


                            

                            <div class="col-md-2">
                                <div class="pull-right heading-feedback mt-20" >
                                    <div style="margin-bottom:20px;" id="share{{$bus->id}}">
                                         <!-- <li style="display: inline;" > -->
                                            <a href="javascript:void(0);" ><i class="fa fa-bookmark-o"></i> &nbsp; Share </a> 
                                          
                                            <ul id="myDIV{{$bus->id}}" class="nav-dropdown nav-dropdown-menu social-icons" style="border: 1px solid #ccc;">
                                                
                                                <div class="col-md-12" style="width:350px; background:#d0d0d0;box-shadow: 0px 0px 1px 0px #50575e;margin-left:-100px;"> 
                                                    
                                                    <div class="row" >
                                                        <div class="col-md-6" style="margin-top:5px;">
                                                            <a href="#" onclick="facebook('{{$bus->id}}')">
                                                                <i class="fa fa-facebook"><span style="margin-left: 20px;color:black;"> Facebook </span></i>
                                                            </a> 
                                                        </div>
                                                        <div class="col-md-6" style="margin-top:5px;">
                                                            <a href="#" onclick="twitter('{{$bus->id}}')">
                                                                <i class="fa fa-twitter"><span style="margin-left: 20px;color:black;"> Twitter </span></i>
                                                            </a>
                                                        </div>
                                                    </div>    

                                                    <div class="row"> 
                                                        <div class="col-md-6" style="margin-top:5px;margin-bottom:5px;">
                                                            <a href="#" onclick="googleOpen('{{$bus->id}}')">
                                                                <i class="fa fa-google-plus"><span style="margin-left:10px;color:black;"> Google Plus </span></i>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6" style="margin-top:5px;margin-bottom:5px;">
                                                        <a href="#" onclick="linkedin('{{$bus->id}}')">
                                                            <i class="fa fa-linkedin"><span style="margin-left: 20px;color:black;">  Linkedin </span></i>
                                                        </a> 
                                                        </div>
                                                    </div>                                                                                                    
                                                </div>                                              
                                            </ul>
                                        <!-- </li>  -->
                                    </div>                                                                           
                                    <!-- <a href="#" onclick="linkedin()" data-target="#myModal"><i class="fa fa-comments-o"></i> &nbsp; Linkedin </a> -->
                                    <a href="#" onclick="printElement('div{{$bus->id}}')"> <i class="fa fa-print"></i> &nbsp; Print </a>   
                                </div>
                            </div>

                            <div class="col-md-12">
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


                <div class="blog-content-item single-blog-details single-map-view display-none">
                    <div id="map" style="width: 100%; height: 500px">  </div>
                </div>

            </div><!-- .col end -->


        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- End blog section -->


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
                    <button class="xs-btn sm-btn"> Create Your Account </button>   
                    <p style="margin-top: 10px;">
                        or if you already have an account login below
                    </p>
                    <button class="xs-btn sm-btn"><i class="fa fa-facebook-official"></i> Log in with Facebook </button>   
                </div>
                <div class="text-center">
                    <p style="margin-top: 40px;">
                        or log in using your email address
                    </p>

                    <form class="form-horizontal" action="#">
                        <div class="form-group">
                            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
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

@stop


@section('script')
<script type="text/javascript" src='https://maps.google.com/maps/api/js?key=AIzaSyCRNY-cTsigdvQMVHNaq5ShA1yteywcb64&sensor=false&libraries=places'></script>

<script type="text/javascript">

var markers = [       
    ];

    function initMap() {
        var centerOfMap = new google.maps.LatLng(56.1304, 106.3468);
        if(markers.length > 0){
            centerOfMap = new google.maps.LatLng(parseFloat(markers[0].lat), parseFloat(markers[0].lng));
        }
        var mapOptions = {
            center: centerOfMap,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };

        var map = new google.maps.Map(document.getElementById("map"), mapOptions);

        //Create and open InfoWindow.
        var infoWindow = new google.maps.InfoWindow({ maxWidth: 500 });
        for (var i = 0; i < markers.length; i++) {
            var data = markers[i];
            var myLatlng = new google.maps.LatLng(data.lat, data.lng);
            var marker = new google.maps.Marker({
                position: myLatlng,
                map: map,
                title: data.title
            });

            //Attach click event to the marker.
            (function (marker, data) {
                google.maps.event.addListener(marker, "click", function (e) {
                    infoWindow.setContent("<div class='col-md-12'> <h3>"+data.title+"</h3> <div class='col-md-12'> <img src='"+data.img+"' style='height: 250px;width:100%;'> </div> <p style='margin-top:20px;'> "+data.description+ "</p></div>");
                    infoWindow.open(map, marker);
                });
            })(marker, data);
        }
    }    

    google.maps.event.addDomListener(window, 'load', initMap);

    $(document).ready( function() {        
        document.getElementById("search").onclick = function() {    
            document.getElementById("formId").submit();
        }        
        var e = document.getElementById('share');
        e.onmouseover = function() {
            document.getElementById('myDIV').style.display = 'block';
        }
        e.onmouseout = function() {
            document.getElementById('myDIV').style.display = 'none';
        }       
    
        
        var categoryId = document.getElementById("categoryId").value;
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        var business;
        $.ajax({ 
          type: 'POST',
          data: { id:categoryId},
          url: "{{ URL::to('getBusinessByCat')}}",
          success: function(result) {     
                var res = result.results;               
                if(res == 200){
                    business = result.business;
                    for( i = 0; i < business.length; i++) {
                        
                        var item = {
                            "title": business[i]['title'],
                            "lat": business[i]['lat'],
                            "lng": business[i]['lng'],
                            "description": business[i]['description'],
                            "img":window.location.origin + "/"+   business[i]['img']
                        };
                        markers.push(item);   
                        let temp = i;
                        var ee = document.getElementById('share' + business[i]['id']);
                        ee.onmouseover = function() {
                            document.getElementById('myDIV' + business[temp]['id'] ).style.display = 'block';
                        }
                        ee.onmouseout = function() {
                            document.getElementById('myDIV' + business[temp]['id']).style.display = 'none';
                        }

                    }                    
                    initMap();
                   

                }else{
                    alert("Failed");
                }
          }        
        });


    });

    function sleep(milliseconds) {
        var start = new Date().getTime();
        for (var i = 0; i < 1e7; i++) {
            if ((new Date().getTime() - start) > milliseconds){
            break;
            }
        }
    }

    function onClickListView() 
    {
        $(".single-map-view").addClass("display-none").removeClass("display-block");
        $(".single-list-view").removeClass("display-none").addClass("display-block");
        document.getElementById('myDIV').style.display = 'none';
    }

    function onClickMapView() 
    {
        $(".single-list-view").addClass("display-none").removeClass("display-block");
        $(".single-map-view").removeClass("display-none").addClass("display-block");    
        document.getElementById('myDIV').style.display = 'none';
    }



    
    function openModal() 
    {
        $("#myDIV").removeClass("mystyle");
        $("#myModal").modal('show');
    }

    function myFunction() {
        var element = document.getElementById("myDIV");
        element.classList.toggle("mystyle");
    }

    function  appendCategoryList()
    {
        category = "";
        var categoryBodyContent = "";
            categoryBodyContent += '<li><a href="#">Restaurants</a></li>';
            categoryBodyContent += '<li><a href="#">All Eateries</a></li>';
            categoryBodyContent += '<li><a href="#">Community</a></li>';
            category = categoryBodyContent;
            $(".list-group").append(category);
            $("#viewALL").addClass("display-none");
    }



    function facebook(url){
        if(url == ""){
            url = document.URL;
        }else{
            url = window.location.origin + "/businessDirectoryOverview/" + url;   
        }
        var facebookWindow = window.open('https://www.facebook.com/sharer/sharer.php?u=' + url, 'facebook-popup', 'height=350,width=600');
        if(facebookWindow.focus) { facebookWindow.focus(); }
        return false;
    }
    function twitter(url){
        if(url == ""){
            url = document.URL;
        }else{
            url = window.location.origin + "/businessDirectoryOverview/" + url;   
        }
        var twitterWindow = window.open('https://twitter.com/share?url=' + url, 'twitter-popup', 'height=350,width=600');
        if(twitterWindow.focus) { twitterWindow.focus(); }    
        return false;
    }

    function googleOpen(url){
        if(url == ""){
            url = document.URL;
        }else{
            url = window.location.origin + "/businessDirectoryOverview/" + url;   
        }
        window.open("https://plus.google.com/share?url='" + url + "'",
        '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');        
        return;
    }

    function linkedin(url){
        if(url == ""){
            url = document.URL;
        }else{
            url = window.location.origin + "/businessDirectoryOverview/" + url;   
        }
        var twitterWindow = window.open('https://www.linkedin.com/shareArticle?mini=true&url=' + url, 'linkedin-popup', 'height=350,width=600');
        if(twitterWindow.focus) { twitterWindow.focus(); }         
    }

    function printElement(div) {
        var divToPrint=document.getElementById(div);
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }

    function printElem() {        

        var divToPrint=document.getElementById("divBusiness");
        newWin= window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
        
    }
        
</script>
<!-- <script src="https://code.jquery.com/jquery-1.10.2.js"></script> -->


<script type="text/javascript">
    
    $.fn.extend({
    treed: function (o) {
      
      var openedClass = 'glyphicon-minus-sign';
      var closedClass = 'glyphicon-plus-sign';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                }
            })
            branch.children().children().toggle();
        });
        //fire event from the dynamically added icon
      tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click();
        });
      });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});

//Initialization of treeviews
$('#collapseOne').treed();
</script>


@stop


