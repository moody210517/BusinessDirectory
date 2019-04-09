
@extends('admin.main')
@section('content')
<div id="content" class="flex ">
    <div class="page-container-1" id="page-container">
        <div class="page-title padding pb-0 ">
            <h2 class="text-md mb-0">Add Time
            <a href="{{ url('admin/timeLists') }}" class="btn btn-raised btn-wave w-xs blue" style="float: right;color: white;">Back</a>
            </h2>
        </div>        
    <div class="padding">

    <div class="tab-content mb-4">
        <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab">
            <form method="post" action="{{ url('admin/addTime') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="time" name="start_time" class="col-md-6 form-control" placeholder="Name" style="line-height: 2;" required="required">
                </div>

                <div class="form-group">
                    <input type="time" name="end_time" class="col-md-6 form-control" placeholder="Desc" style="line-height: 2;" required="required">
                </div>                  
                

                <div class="form-group">
                    <!-- <label>Select2 multi select</label> -->
                    <select id="week_of_day" name="week_of_day" class="col-md-6 form-control">                        
                            <option value="1" > Monday </option>                                                           
                            <option value="2"> Tuesday </option>                                                           
                            <option value="3" > Wendesday </option>                                                           
                            <option value="4" > Thursday </option>                                                           
                            <option value="5" > Friday </option>                                                           
                            <option value="6"> Saturday </option>                                                           
                            <option value="7"> Sunday </option>                                                            
                    </select>
                </div>
                    

                <div class="col-md-6 form-group" style="padding: 0px;">                    
                    <button class="btn btn-raised btn-wave mb-2 w-xs blue" style="float: right;">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop



