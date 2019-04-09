@extends('admin.main')
@section('content')
<div id="content" class="flex ">
    <div class="page-container-1" id="page-container">
        <div class="page-title padding pb-0 ">
            <h2 class="text-md mb-0">Edit Cateogry
            <a href="{{ url('admin/categoryLists') }}" class="btn btn-raised btn-wave w-xs blue" style="float: right;color: white;">Back</a>
            </h2>
        </div>
        
        <div class="padding">

        <div class="tab-content mb-4">
            <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab">
                <form method="post" action="{{ url('admin/editCategory')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    
                    <div class="form-group">
                        <input type="text" name="name" class="col-md-6 form-control" placeholder="Email" style="line-height: 2;" value="{{ $user->name }}" required="required">
                    </div> 

                    <div class="form-group">
                        <input type="text" name="desc" class="col-md-6 form-control" placeholder="Desc" style="line-height: 2;" value="{{ $user->desc }}" required="required">
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

