
@extends('user.main')
@section('content')

<section class="section-padding" style="padding-top: 0px;margin-top: 94px;">
    <div class="container">
        <div class="container">
            <div id="content" class="">
                
                <div class="page-container-1" id="page-container">
                    <div class="page-title">
                        <p><h4 class="text-md mb-0">Add Event</h4></p>
                    </div>        
                <div class="padding">

                <div class="tab-content mb-8">
                    <div class="tab-pane fade show active" id="home2" role="tabpanel" aria-labelledby="home-tab">
                        <form method="post" action="{{ url('addEvent') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name" style="line-height: 2;" required="required">
                            </div>

                            <div class="form-group">
                                <textarea type="text" name="desc" class="form-control" placeholder="Desc" style="line-height: 2;" required="required"></textarea>
                            </div>                  

                            <div class="form-group">
                                <input type="date" name="event_date" class="form-control" placeholder="Event Date" style="line-height: 2;" required="required">
                            </div>                            
                            <div class="form-group">
                                <textarea type="text" name="venue_details" class="form-control" placeholder="Venue details" style="line-height: 2;" required="required"></textarea>
                            </div>       
                            <div class="form-group">
                                <input type="text" name="website" class="form-control" placeholder="Website" style="line-height: 2;" >
                            </div>           
                            <div class="form-group">
                                <input type="text" name="ticket_cost" class="form-control" placeholder="Ticket Cost" style="line-height: 2;" >
                            </div>                  
                            <div class="form-group">
                                <input type="file" name="image" class="form-control" placeholder="Image" style="line-height: 2;" required="required">
                            </div>              
<!--                             
                            <div class="form-group">                                                  
                                <select id="book_id" name="book_id" class="col-md-6 form-control">
                                    @foreach($books as $book)
                                        <option value="{{$book->id}}}"> {{$book->title}} </option>                                        
                                    @endforeach
                                </select>
                            </div> -->
                            
                        

                            <div class="form-group" style="padding: 0px;">                    
                                <button class="btn btn-raised btn-wave mb-2 w-xs blue" style="float: right;">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>


@stop



