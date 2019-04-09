@extends('admin.main')
@section('content')
<div id="content" class="flex ">
    <div class="page-container-1" id="page-container">
        <div class="page-title padding pb-0 ">
            
        </div>
        
        <div class="padding">

        <div class="tab-content mb-4">
            <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab">
                <form method="post" action="{{ url('admin/settings')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="1">
                    
                    <div class="form-group">
                        <label>Phone Number</label>
                        <input type="phone" name="phone" class="col-md-6 form-control" placeholder="Title" style="line-height: 2;" value="{{ $setting->phone }}" required="required" pattern="[0-9]{3} [0-9]{3} [0-9]{4}">
                    </div> 

                    <div class="form-group">
                        <label>First Email</label>
                        <input type="text" name="email1" class="col-md-6 form-control" placeholder="Description" style="line-height: 2;" value="{{ $setting->email1 }}" required="required" >
                    </div>   

                     <div class="form-group">
                        <label>Second Email</label>
                        <input type="textarea" name="email2" class="col-md-6 form-control" placeholder="Description" style="line-height: 2;" value="{{ $setting->email2 }}" required="required">
                    </div>   
          
                    <div class="col-md-6 form-group" style="padding: 0px;">                        
                        <button class="btn btn-raised btn-wave mb-2 w-xs blue" style="float: right;">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop

