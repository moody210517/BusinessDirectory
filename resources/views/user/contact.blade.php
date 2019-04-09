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

<!-- <section class="tips-tricks-sec" style="padding-top: 40px;padding-bottom: 40px;margin-top: 66px;">
    <div class="container">
        <div class="row">
            <img src="{{ asset('assets/images/amazon.jpg') }}" class="center">
        </div>
    </div>
</section> -->

<!--  get in touch section -->
<section class="xs-get-in-touch" style="padding-top: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="get-in-touch-cont text-center">
                    <h3><span class="light-text">Get</span> in touch</h3>
                    <p></p>
                </div>
            </div>
        </div><!-- .row end -->
    </div><!-- .container end -->
</section><!-- End get in touch section -->

<!--  contact section -->
<section class="xs-contact-sec">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="xs-form-group">
                    <form action="{{ url('sendMsg')}}" method="POST" id="xs-contact-formx" class="xs-form">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="name" placeholder="Your name" id="xs_contact_name" required="required">
                            </div>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" name="email" placeholder="Your email" id="xs_contact_email" required="required">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="number" class="form-control" name="phonenumber" placeholder="Your phone number" id="xs_contact_phone" required="required">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" id="xs_contact_subject" required="required">
                            </div>
                        </div>
                        <textarea name="msg" placeholder="Message" id="x_contact_massage" class="form-control message-box" cols="30" rows="10" required="required"></textarea>

                        <div class="xs-btn-wraper">
                            <input type="submit" class="xs-btn" id="xs_contact_submit" value="SEND MESSAGE">
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
<!--  contact section -->
<section class="xs-contact-infomation xs-contact-info-1">
    <div class="container">
        <div class="row">
        
            
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-group">
                    <i class="fa fa-envelope-o"></i>
                    <h4>Mail us</h4>
                    <a href="mailto:{{$setting->email1}}">{{$setting->email1}}</a>
                    <a href="mailto:{{$setting->email1}}">{{$setting->email2}}</a>
                </div>
                <!-- .contact-info-group END -->
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="contact-info-group">
                    <i class="fa fa-volume-control-phone"></i>
                    <h4>Call us</h4>
                    <span>Olds, Sundre & Area 403-556-5736</span>
                    <span class="text-color">Rimbey, Bentley & Area 403-704-3825</span>
                </div>
                <!-- .contact-info-group END -->
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="contact-info-group">
                    <i class="fa fa-map-marker"></i>
                    <h4>Blue Spruce Community</h4> 
                    <span>Box 3937 Olds, Alberta T4H 1A0</span>
                    <span class="text-color">Box 858 Rimbey, Alberta T0C 2J0</span>
                </div>
            </div>
            
        </div>
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