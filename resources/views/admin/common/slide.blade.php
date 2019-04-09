<div id="aside" class="page-sidenav no-shrink  nav-expand  animate fadeInLeft fade" aria-hidden="true">
                <div class="sidenav h-100 modal-dialog bg-white box-shadow">
                    <!-- sidenav top -->
                    <!-- Flex nav content -->
                    <div class="flex scrollable hover">
                        <div class="nav-border b-primary" data-nav>
                            <ul class="nav bg">
                                <!-- <li class="nav-header hidden-folded">
                                    <span>Main</span>
                                </li>
                                <li class="{!! Request::is('admin/dashboard') || Request::is('loginCheck') ? 'active' : '' !!}">
                                    <a href="{{ URL::to('admin/dashboard')}}" class="i-con-h-a location-href" data-link="dashboard">
                                    <span class="nav-icon">
                                    <i class="i-con i-con-home"><i></i></i>
                                    </span>
                                    <span class="nav-text">Dashboard</span>
                                    </a>
                                </li> -->

                                <li class="nav-header hidden-folded">
                                    <span>User management </span>
                                </li>

                                <li class="{!! Request::is('admin/users') || Request::is('admin/addUser') || Request::is('admin/editUser/*')|| Request::is('admin/editUser')|| Request::is('loginCheck') ? 'active' : '' !!}">                                
                                    <a href="{{ URL::to('admin/users') }}" class="i-con-h-a location-href" data-link="calendar">
                                    <span class="nav-icon"><i class="i-con i-con-users"><i></i></i> </span>
                                    <span class="nav-text">User</span> 
                                    </a>
                                </li>                                

                                <li class="nav-header hidden-folded">
                                    <span>Business management </span>
                                </li>

                                <li class="{!! Request::is('admin/directoryLists/*') || Request::is('admin/addDirectory/*') || Request::is('admin/editDirectory/*')|| Request::is('admin/addBusiness/*')|| Request::is('admin/businessLists/*') || Request::is('admin/editDirectory') || Request::is('admin/editBusiness/*') ? 'active' : '' !!}"> 
                                    <a href="{{ URL::to('admin/directoryLists', 0) }}" class="i-con-h-a location-href" data-link="calendar">
                                    <span class="nav-icon"><i class="i-con i-con-users"><i></i></i> </span>
                                    <span class="nav-text">Business Directory</span> 
                                    </a>
                                </li>     

                                <li class="{!! Request::is('admin/categoryLists') || Request::is('admin/addCategory') || Request::is('admin/editCategory')|| Request::is('admin/addCategory/*')|| Request::is('admin/categoryLists/*') ? 'active' : '' !!}">                                
                                    <a href="{{ URL::to('admin/categoryLists') }}" class="i-con-h-a location-href" data-link="calendar">
                                    <span class="nav-icon"><i class="i-con i-con-users"><i></i></i> </span>
                                    <span class="nav-text">Category</span> 
                                    </a>
                                </li>   

                                <li class="{!! Request::is('admin/timeLists') || Request::is('admin/addTime') || Request::is('admin/editTime')? 'active' : '' !!}">                                
                                    <a href="{{ URL::to('admin/timeLists') }}" class="i-con-h-a location-href" data-link="calendar">
                                    <span class="nav-icon"><i class="i-con i-con-users"><i></i></i> </span>
                                    <span class="nav-text">Time </span> 
                                    </a>
                                </li>   


                          
                                <li class="nav-header hidden-folded">
                                    <span>Event management </span>
                                </li>

                                <li class="{!! Request::is('admin/eventLists') || Request::is('admin/addEvent') || Request::is('admin/editEvent')|| Request::is('admin/addEvent/*')|| Request::is('admin/eventLists/*') ? 'active' : '' !!}">                                
                                    <a href="{{ URL::to('admin/eventLists') }}" class="i-con-h-a location-href" data-link="calendar">
                                    <span class="nav-icon"><i class="i-con i-con-users"><i></i></i> </span>
                                    <span class="nav-text">Event</span> 
                                    </a>
                                </li>   
                                <li class="{!! Request::is('admin/adLists') || Request::is('admin/addAd') || Request::is('admin/editAd')|| Request::is('admin/addAd/*')|| Request::is('admin/adLists/*') ? 'active' : '' !!}">                                
                                    <a href="{{ URL::to('admin/adLists') }}" class="i-con-h-a location-href" data-link="calendar">
                                    <span class="nav-icon"><i class="i-con i-con-users"><i></i></i> </span>
                                    <span class="nav-text">Advertise</span> 
                                    </a>
                                </li>   






                                <li class="nav-header hidden-folded">
                                    <span>Contact management </span>
                                </li>

                                <li class="{!! Request::is('admin/contactLists')  ? 'active' : '' !!}"> 
                                    <a href="{{ URL::to('admin/contactLists') }}" class="i-con-h-a location-href" data-link="calendar">
                                    <span class="nav-icon"><i class="i-con i-con-users"><i></i></i> </span>
                                    <span class="nav-text">Contact</span> 
                                    </a>
                                </li>     
                                <li class="{!! Request::is('admin/rateLists')  ? 'active' : '' !!}"> 
                                    <a href="{{ URL::to('admin/rateLists') }}" class="i-con-h-a location-href" data-link="calendar">
                                    <span class="nav-icon"><i class="i-con i-con-users"><i></i></i> </span>
                                    <span class="nav-text">Rate Lists</span> 
                                    </a>
                                </li>   



                                <li class="nav-header hidden-folded">
                                    <span>Settings </span>
                                </li>

                                <li class="{!! Request::is('admin/settings')  ? 'active' : '' !!}"> 
                                    <a href="{{ url('admin/settings') }}" class="i-con-h-a location-href" data-link="calendar">
                                    <span class="nav-icon"><i class="i-con i-con-users"><i></i></i> </span>
                                    <span class="nav-text">Email Settings</span> 
                                    </a>
                                </li>     


                            </ul>
                        </div>
                    </div>
                    <!-- sidenav bottom -->
                    <div class="no-shrink ">
                        <div class="text-sm p-3 b-t">
                            <div class="hidden-folded text-sm">
                                <div class="mt-1">
                                </div>
                                <div class="text-muted"><small class="text-muted">&copy; Copyright 2018, Dentware</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>