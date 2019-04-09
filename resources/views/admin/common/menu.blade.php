<header id="header" class="page-header bg-white box-shadow animate fadeInDown">
            <div class="navbar navbar-expand-lg" >
                <!-- btn to toggle sidenav on small screen -->
                <a class="d-lg-none i-con-h-a px-1" data-toggle="modal" data-target="#aside">
                <i class="i-con i-con-menu text-muted"></i>
                </a>
                <!-- brand -->
                <a href="#" class="navbar-brand">
                <img class="img-thumbnail logo-img" src="{{ asset('assets/img/a1.jpg') }}" alt="Dentware">                   
                </a>
                <!-- / brand -->
                <!-- Navbar collapse -->
                <div class="collapse navbar-collapse order-2 order-lg-1" id="navbarToggler">
                </div>
                <ul class="nav navbar-menu order-1 order-lg-2">
                    <!-- <li class="nav-item d-none d-sm-block">
                        <a class="nav-link px-2 i-con-h-a" data-plugin="screenfull" data-toggle="fullscreen" data-title="Fullscreen">
                        <i class="i-con i-con-fullscreen"></i>
                        </a>
                    </li>
                                                            -->
                    <!-- User dropdown menu -->
                    <li class="nav-item dropdown">
                        <a href="#" data-toggle="dropdown" class="nav-link d-flex align-items-center py-0 px-lg-0 px-2 text-color">
                        <span class=" mx-2 d-none l-h-1x d-lg-block text-right">
                        <small class='text-fade d-block mb-1'>Hello, Welcome</small>
                        <span>
                        @if(Session::has('name'))                        
                            {{ Session::get('name')}}                        
                        @endif
                        </span>
                        </span>
                        <span class="avatar w-36">
                        <img src="{{ asset('assets/img/a1.jpg') }}" alt="...">
                        </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right w pt-0 mt-3 animate fadeIn">
                            <div class="row no-gutters mb-2 text-center r-t b-b">
                                <div class="col-4 b-r">
                                    <a href="javascript:void(0)" class="py-3 d-block i-con-h-a">
                                    <i class="i-con i-con-users"><i></i></i>
                                    </a>
                                </div>
                                <div class="col-4 b-r">
                                    <a href="javascript:void(0)" class="py-3 d-block i-con-h-a">
                                    <i class="i-con i-con-mail"><i></i></i>
                                    </a>
                                </div>
                                <div class="col-4">
                                    <a href="javascript:void(0)" class="py-3 d-block i-con-h-a">
                                    <i class="i-con i-con-comment"><i></i></i>
                                    </a>
                                </div>
                            </div>
                            <!-- <a class="dropdown-item" href="javascript:void(0)">
                            <span>Profile</span>
                            </a>
                            <a class="dropdown-item" href="javascript:void(0)">
                            <span>Account Settings</span>
                            </a> -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ url('logout') }}">Sign out</a>
                        </div>
                    </li>
                    <!-- Navarbar toggle btn -->
                    <li class="nav-item d-lg-none">
                        <a href="#" class="nav-link i-con-h-a px-1" data-toggle="collapse" data-toggle-class data-target="#navbarToggler">
                        <i class="i-con i-con-nav text-muted"><i></i></i>
                        </a>
                    </li>
                </ul>
            </div>
        </header>