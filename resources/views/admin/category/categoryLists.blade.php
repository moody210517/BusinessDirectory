@extends('admin.main')

@section('content')     
    <div class="page-container-1" id="page-container">
        <div class="page-title padding pb-0 ">
            <h2 class="text-md mb-0" style="padding-bottom: 35px;">Category lists
            <a href="{{ url('admin/addCategory') }}" class="btn btn-raised btn-wave  blue" style="float: right;color: white;">Add Category</a>
            </h2>
        </div>

        <div class="padding pt-0 ">
            <div class="table-responsive">
                <table id="datatable" class="table table-theme table-row v-middle" data-plugin="dataTable" style="margin-top: -15px;">
                    <thead>
                        <tr>
                            <th><span class="text-muted"> Name</span></th>
                            <th><span class="text-muted">Desc</span></th>
                            <th><span class="text-muted">Created</span></th>
                            <th><span class="text-muted">Action</span></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($users as $user)
                            <tr>
                                <td>
                                    <a href="javascript:void(0);" class="item-author ">{{$user->name}}</a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="item-author ">{{$user->desc}}</a>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="item-author ">{{$user->created_at}}</a>
                                </td>
                                <td>
                                    <a href="{{ url('admin/editCategory', $user->id)}}" class="btn btn-raised btn-wave w-xs bg-white" style="color:black;">Edit</a>                                    
                                    <button onclick="deleteUser({{$user->id}})" class="btn btn-raised btn-wave w-xs blue" data-toggle="modal" data-target="#m">Delete</button>
                                </td>
                            </tr>
                        
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- modal -->
<div id="m" class="modal" data-backdrop="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title">Are you sure to execute this action?</h5>
        </div>
        <!-- <div class="modal-body text-center p-lg">
        <p></p>
        </div> -->
        <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">No</button>
        <button id="delBtn" type="button" class="btn btn-primary delBtn" data-dismiss="modal">Yes</button>
        </div>
    </div><!-- /.modal-content -->
    </div>
</div>
@stop



@section('script')


<script type="text/javascript">   

    // $(document).ready(function(){    
    //     var table = $('#myTable').DataTable();      
    // });

    

    var deleteId = "";
    function deleteUser(id){
        deleteId = id;
    }

    $("#delBtn").click(function(){    
        var id = deleteId;
        //var request = $.get('{{ URL::to('admin/deleteUser')}}' + "?id=" + id);
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        $.ajax({
          type: 'POST',
          data: { id:id},
          url: "{{ URL::to('admin/deleteCategory')}}",
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