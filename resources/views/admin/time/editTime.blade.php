@extends('admin.main')
<link rel="stylesheet" href="{{ asset('libs/select2/dist/css/select2.min.css')}}" type="text/css" />
@section('content')
<div id="content" class="flex ">
    <div class="page-container-1" id="page-container">
        <div class="page-title padding pb-0 ">
            <h2 class="text-md mb-0">Edit Time
            <a href="{{ url('admin/timeLists') }}" class="btn btn-raised btn-wave w-xs blue" style="float: right;color: white;">Back</a>
            </h2>
        </div>
        
        <div class="padding">

        <div class="tab-content mb-4">
            <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab">
                <form method="post" action="{{ url('admin/editTime')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    
                    <div class="form-group">
                        <input type="text" name="start_time" class="col-md-6 form-control" placeholder="Email" style="line-height: 2;" value="{{ $user->start_time }}" required="required">
                    </div> 

                    <div class="form-group">
                        <input type="text" name="end_time" class="col-md-6 form-control" placeholder="Desc" style="line-height: 2;" value="{{ $user->end_time }}" required="required">
                    </div>   

                    <div class="form-group">
                    
                        <!-- <label>Select2 multi select</label> -->
                        <select id="week_of_day" name="week_of_day" class="col-md-6 form-control">                       

                                <option value="1" {{$user->week_of_day == "1"? 'selected':''}}> Monday </option>                                                           
                                <option value="2" {{$user->week_of_day == "2"? 'selected':''}}> Tuesday </option>                                                           
                                <option value="3" {{$user->week_of_day == "3"? 'selected':''}}> Wendesday </option>                                                           
                                <option value="4" {{$user->week_of_day == "4"? 'selected':''}}> Thursday </option>                                                           
                                <option value="5" {{$user->week_of_day == "5"? 'selected':''}}> Friday </option>                                                           
                                <option value="6" {{$user->week_of_day == "6"? 'selected':''}}> Saturday </option>                                                           
                                <option value="7" {{$user->week_of_day == "7"? 'selected':''}}> Sunday </option>                                                            
                                                
                        </select>
                    </div>

                    
                    <div class="col-md-6 form-group" style="padding: 0px;">                        
                        <button class="btn btn-raised btn-wave mb-2 w-xs blue" style="float: right;">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop


@section('script')
<script src="{{ asset('libs/select2/dist/js/select2.min.js') }}" ></script>
<script src="{{ asset('assets/js/plugins/select2.js') }}" ></script>
<script>
$('#category_id').select2();
</script>
@stop
