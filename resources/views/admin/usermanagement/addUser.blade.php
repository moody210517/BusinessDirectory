
@extends('admin.main')
@section('content')
<div id="content" class="flex ">
    <div class="page-container-1" id="page-container">
        <div class="page-title padding pb-0 ">
            <h2 class="text-md mb-0">Add User
            <a href="{{ url('admin/users') }}" class="btn btn-raised btn-wave w-xs blue" style="float: right;color: white;">Back</a>
            </h2>
        </div>        
    <div class="padding">

    <div class="tab-content mb-4">
        <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab">
            <form method="post" action="{{ url('admin/addUser') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" name="name" class="col-md-6 form-control" placeholder="Name" style="line-height: 2;" required="required">
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="col-md-6 form-control" placeholder="Email" style="line-height: 2;" required="required">
                </div>

                
                <div class="form-group">
                    <input type="password" name="password" class="col-md-6 form-control" placeholder="Password" style="line-height: 2;" required="required">
                </div>

                <div class="form-group">
                    <input type="password" name="confirmPassword" class="col-md-6 form-control" placeholder="Confirm Password" style="line-height: 2;" required="required">
                </div>

                <div class="form-group">
                    <select name="role" class="col-md-6 custom-select" style="height: 40px;border-color: #4e82ff;color: #4e82ff;" required="required">
                        <option value="1" selected="">Super Admin</option>
                        <option value="2">Admin</option>
                        <option value="3">Editor</option>
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



