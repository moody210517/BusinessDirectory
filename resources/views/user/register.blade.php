@extends('user.main')
@section('content')

<!--breadcumb start here-->
<!-- <section class="banner-inner-sec" style="background-image: url(assets/images/banner-slider/slider4.jpg);">
    <div class="banner-table">
        <div class="banner-table-cell">
            <div class="container">
                <div class="banner-inner-content">
                    <h2 class="banner-inner-title">Contact Us</h2>
                    <ul class="xs-breadcumb">
                        <li><a href="{{ URL::to('home')}}"> Home  / </a> Contact Us</li>
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
</style>


<!--  get in touch section -->
<section  style="padding-top: 70px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="get-in-touch-cont text-center" style="margin-top:20px;">
                    <h3><span class="light-text"></span> </h3>
                    <h3>Create Your Account</h3>
                </div>
            </div>
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- End get in touch section -->

<!--  contact section -->
<section class="xs-contact-sec">
    <div class="container">
        <div class="row center">
            <div class="col-lg-12">
                <div class="xs-form-group">
                    <form action="{{ url('register')}}" method="POST" id="xs-contact-formx" class="xs-form">
                        {{ csrf_field() }}
                        <input type="hidden" class="form-control" name="businessId" placeholder="Name" id="businessId" value="{{$businessId}}">
                        <div class="col-lg-12">
                            <input type="text" class="form-control" name="name" placeholder="Name" id="xs_contact_name">
                        </div>                            
                        <div class="col-lg-12">
                            <input type="email" class="form-control" name="email" placeholder="Email" id="xs_contact_name">
                        </div>    
                        <div class="col-lg-12">
                            <input type="password" class="form-control" name="password" placeholder="Password" id="xs_contact_name">
                        </div>    
                    
                        <div class="xs-btn-wraper">
                            <input type="submit" class="xs-btn" id="xs_contact_submit" value="Sign Up">
                        </div>
                    </form>
                </div>
            </div><!-- col end -->
            <!-- <div class="col-lg-5">
                <div class="contact-map">
                    <div style="width: 100%">
                        <iframe src="https://maps.google.com/maps?width=100&amp;height=600&amp;hl=en&amp;q=New%20York%2C%20USA+(My%20Business%20Name)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed"></iframe>
                    </div>
               </div>
            </div> -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- End contact section -->



@stop

@section('script')
<script  type="text/javascript">
    $("#btnSend").click(function(){    
        var id = deleteId;
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
          type: 'POST',
          data: { id:id},
          url: "{{ URL::to('admin/deleteDirectory')}}",
          success: function(result) {     
                var res = result.results;
                if(res == 200){
                    location.reload();
                }else{
                    alert("Failed");
                }
          }        
        });
    });    

</script>
@stop