@extends('admin.main')
@section('content')     
<div class="page-container-1" id="page-container">
    <div class="page-title padding pb-0 ">
        <h2 class="text-md mb-0" style="padding-bottom: 35px;">Business Directotry of {{$parent?$parent->title:' Root ' }}        
        <a href="{{ url($parent?'admin/addBusiness':'admin/addDirectory', $parent?$parent->id:'0' ) }}" class="btn btn-raised btn-wave  blue" style="float: right;color: white;">Add Book</a>
        </h2>
    </div>




                
    <div class="padding pt-0 ">
        <div class="table-responsive">
            <table id="datatable1" class="table table-theme table-row v-middle" data-plugin="dataTable" style="margin-top: -15px;">
                    <thead>
                        <tr>
                            <th><span class="text-muted">Image </span></th>
                            <th><span class="text-muted">Title </span></th>
                            <th><span class="text-muted">Description</span></th>
                            <th><span class="text-muted">Created</span></th>
                            <th><span class="text-muted">Action</span></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($directories as $directory)
                            <tr class=" " data-id="3">
                               <td>
                                    <img src="{{ url($directory->img) }}" style="width:100px;height:130px;"/>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="item-author ">{{$directory->title}}</a>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="item-author ">{{$directory->desc}}</a>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="item-author ">{{$directory->created_at}}</a>
                                </td>

                                <td>
                                    <a href="{{ url('admin/editDirectory', $directory->id)}}" class="btn btn-raised btn-wave w-xs bg-white" style="color:black;">Edit</a>
                                    <button onclick="deleteD({{$directory->id}})" class="btn btn-raised btn-wave w-xs blue" data-toggle="modal" data-target="#m">Delete</button>
                                    <a href="{{ url('admin/businessLists', $directory->id)}}" class="btn btn-raised btn-wave w-xs bg-white" style="color:black;">More</a>
                                    
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
<script src = "http://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">   

    $(document).ready(function () {
        $('#datatable1').DataTable({
            aaSorting: [[1, "asc"]]
        });
    });

    
    var deleteId = "";
    function deleteD(id){
        deleteId = id;
    }

    $("#delBtn").click(function(){    
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