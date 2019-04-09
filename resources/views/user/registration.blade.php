@extends('user.main')
@section('content')

<!--breadcumb start here-->
<section class="banner-inner-sec" style="background-image: url(assets/images/banner-slider/slider4.jpg);height: 200px;">
    <div class="banner-table">
        <div class="banner-table-cell">
            <div class="container">
                <div class="banner-inner-content" style="margin-top: 50px;">
                    <h2 class="banner-inner-title" style="font-size: 35px;">Registration</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!--breadcumb end here-->




<!--  contact section -->
<section class="xs-contact-sec section-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="xs-form-group">
                    <button class="xs-btn-wraper xs-btn" style="line-height: 40px;width: 100%;background: #4267b2;">
                        <i class="fa fa-facebook-official" style="margin-right: 10px;"></i> 
                        Log in with Facebook 
                    </button>   
                    <p class="text-center" style="margin-top: 15px;">
                        <b> -- OR SIGN UP USING YOUR EMAIL ADDRESS -- </b>
                    </p>

                    <form action="#" method="POST" class="xs-form">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="firstname" placeholder="First Name" required>
                            </div>
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                            </div>
                            <div class="col-md-12">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-12">
                                <input type="password" class="form-control" name="password" placeholder="Password" required>
                            </div>
                        </div>
                        <p>
                            By signing up, you agree to our  <a href=""> Terms of Service </a> and <a href=""> Privacy Policy </a>.
                        </p>
                        <div class="xs-btn-wraper">
                            <input type="submit" class="xs-btn" value="SIGN UP">
                        </div>
                    </form>
                    <p style="margin-top: 15px;"> <a href="#"> Already a member - Log in here. </a> </p>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>
<!-- End contact section -->
 
                        











@stop