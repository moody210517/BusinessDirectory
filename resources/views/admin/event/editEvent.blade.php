@extends('admin.main')
@section('content')
<div id="content" class="flex ">
    <div class="page-container-1" id="page-container">
        <div class="page-title padding pb-0 ">
            <h2 class="text-md mb-0">Edit Event
            <a href="{{ url('admin/eventLists') }}" class="btn btn-raised btn-wave w-xs blue" style="float: right;color: white;">Back</a>
            </h2>
        </div>
        
        <div class="padding">

        <div class="tab-content mb-4">
            <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab">
                <form method="post" action="{{ url('admin/editEvent')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $user->id }}">
                    
                    <div class="form-group">
                        <input type="text" name="name" class="col-md-6 form-control" placeholder="Email" style="line-height: 2;" value="{{ $user->name }}" required="required">
                    </div> 

                    <div class="form-group">
                        <textarea type="text" name="desc" class="col-md-6 form-control" placeholder="Desc" style="line-height: 2;"  required="required"> {{ $user->desc }} </textarea>
                    </div>   


                    <div class="form-group">
                        <input type="date" value="{{ $user->event_date }}"  name="event_date" class="col-md-6 form-control" placeholder="Event Date" style="line-height: 2;" required="required">
                    </div>                            
                    <div class="form-group">
                        <textarea type="text"  name="venue_details" class="col-md-6 form-control" placeholder="Venue details" style="line-height: 2;" required="required">{{ $user->venue_details }}</textarea>
                    </div>       
                    <div class="form-group">
                        <input type="text" value="{{ $user->website }}"  name="website" class="col-md-6 form-control" placeholder="Website" style="line-height: 2;">
                    </div>           
                    <div class="form-group">
                        <input type="text" value="{{ $user->ticket_cost }}"  name="ticket_cost" class="col-md-6 form-control" placeholder="Ticket Cost" style="line-height: 2;">
                    </div>                  
                    <div class="form-group">
                        <input type="file"  name="image" class="col-md-6 form-control" placeholder="Image" style="line-height: 2;">
                    </div>   

                    <div class="form-group">                                                  
                        <select id="book_id" name="book_id" class="col-md-6 form-control">
                            @foreach($books as $book)
                                <option value="{{$book->id}}" {{$book->id == $user->book_id ? 'selected':''}}> {{$book->title}} </option>                                        
                            @endforeach
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

