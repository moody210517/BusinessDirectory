@extends('user.main')
@section('content')

<!--  get in touch section -->
<section class="section-padding" style="padding-top: 0px;margin-top: 64px;">
    <div class="container">
        <div class="row">
            
            <div class="col-md-12">
                <div class="box box-primary calender-padding">
                    <div class="box-body inner-calender-padding">
                        <div id="calendar"></div>
                    </div>
                </div>
            </div>

        </div><!-- .row end -->

        <div class="row">               
                <div class="col-md-12 div_center">
                    <a href="{{ url('addEvent')}}">
                    <input type="submit" class="xs-btn" value="Post an Event">
                    </a>
                </div>            
        </div>
        
    </div><!-- .container end -->
</section><!-- End get in touch section -->




 <!-- Modal -->
 <div class="modal fade" id="eventModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">            
            <div class="modal-header">
                <h4 class="modal-title" > <p id="eventTitle"> Title </p> </h4>                
            </div>
            <div class="modal-body">

                <div class="text-center">                    
                    <img src="" id="img" style="width:100%;height:300px;"></img>
                </div>

                <div class="text-center row" style="margin-left:25px;">    
                        <label>Description : </label> <p id="description"></p>                    
                </div>

                <div class="row text-center" style="margin-left:25px;" id="div_website">      
                    <label>Website : </label> <p id="website"></p>
                </div>              

                <!-- <div class="text-center row" style="margin-left:25px;">  
                    <label>Website : </label> <p id="website"></p>
                </div> -->

                <div class="text-center row" style="margin-left:25px;" id="div_ticket">
                    <label>Ticket Cost : </label> <p id="ticket_cost"></p>
                </div>

                <div class="text-center row" style="margin-left:25px;">
                    <label>Event Date : </label> <p id="event_date"></p>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div> 
    </div>
</div>
@stop


@section('script')
<script>

    $( document ).ready(function() {
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $.ajax({
          type: 'GET',
          data: { id:'0'},
          url: "{{ URL::to('loadEvent') }}",
          dataType:'JSON',
          success: function(result) {     
                var res = result.results;                
                if(res == 200){
                            var eventLists = result.events;   
                            var eventArray = [];
                            for(var i = 0; i < eventLists.length; i++){
                                var item = {};
                                item["title"] = eventLists[i].name + "\n" + eventLists[i].website;
                                item["start"] = eventLists[i].created_at;
                                item["backgroundColor"] = eventLists[i].title;
                                item["borderColor"] = eventLists[i].title;
                                item["description"] = eventLists[i].desc;
                                item["website"] = eventLists[i].website;
                                item["image"] = eventLists[i].image;
                                item["ticket_cost"] = eventLists[i].ticket_cost;
                                item["event_date"] = eventLists[i].event_date;                                
                                eventArray.push(item);                                    
                            }
                            /* initialize the external events{}
                            -----------------------------------------------------------------*/
                            function init_events(ele) {
                                ele.each(function () {
                            
                                    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                                    // it doesn't need to have a start or end
                                    var eventObject = {
                                    title: $.trim($(this).text()) // use the element's text as the event title
                                    }
                            
                                    // store the Event Object in the DOM element so we can get to it later
                                    $(this).data('eventObject', eventObject)
                            
                                    // make the event draggable using jQuery UI
                                    $(this).draggable({
                                    zIndex        : 1070,
                                    revert        : true, // will cause the event to go back to its
                                    revertDuration: 0  //  original position after the drag
                                    })
                            
                                })
                            }
                        
                            init_events($('#external-events div.external-event'))
                        
                            /* initialize the calendar
                            -----------------------------------------------------------------*/
                            //Date for the calendar events (dummy data)
                            var date = new Date()
                            var d    = date.getDate(),
                                m    = date.getMonth(),
                                y    = date.getFullYear()
                            $('#calendar').fullCalendar({
                            
                            header    : {
                                left  : 'prev,next today',
                                center: 'title',
                                right: 'month,listMonth'
                                //right : 'mon , listMonth' //,agendaWeek,agendaDay
                            },            
                                       
                            buttonText: {
                                today: 'today',
                                month: 'month',
                                listMonth : 'list',
                                // day  : 'day'
                            },
                            //Random default events
                            events    : eventArray                            
                            ,
                            eventClick: function(event) {
                                if (event.title) {
                                    document.getElementById("img").src = window.location.origin + "/"+  event.image;
                                    document.getElementById("eventTitle").innerHTML = event.title;
                                    document.getElementById("description").innerHTML = event.description;
                                    if(event.ticket_cost == "" || event.ticket_cost == null){
                                        var x = document.getElementById("div_ticket");
                                        x.style.display = "none";
                                    }else{
                                        document.getElementById("ticket_cost").innerHTML = event.ticket_cost;
                                    }
                                    
                                    if(event.website == "" || event.website == null){
                                        var x = document.getElementById("div_website");
                                        x.style.display = "none";
                                    }else{
                                        document.getElementById("website").innerHTML = event.website;
                                    }
                                    
                                    document.getElementById("event_date").innerHTML = event.event_date;
                                    $("#eventModal").modal('show');
                                    return false;
                                }
                            },

                            editable  : true,
                            droppable : true, // this allows things to be dropped onto the calendar !!!
                            drop      : function (date, allDay) { // this function is called when something is dropped
                        
                                // retrieve the dropped element's stored Event Object
                                var originalEventObject = $(this).data('eventObject')
                        
                                // we need to copy it, so that multiple events don't have a reference to the same object
                                var copiedEventObject = $.extend({}, originalEventObject)
                        
                                // assign it the date that was reported
                                copiedEventObject.start           = date
                                copiedEventObject.allDay          = allDay
                                copiedEventObject.backgroundColor = $(this).css('background-color')
                                copiedEventObject.borderColor     = $(this).css('border-color')
                        
                                // render the event on the calendar
                                // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                                $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)
                        
                                // is the "remove after drop" checkbox checked?
                                if ($('#drop-remove').is(':checked')) {
                                // if so, remove the element from the "Draggable Events" list
                                $(this).remove()
                                }
                                
                        
                            }
                            })
                        
                            /* ADDING EVENTS */
                            var currColor = '#3c8dbc' //Red by default
                            //Color chooser button
                            var colorChooser = $('#color-chooser-btn')
                            $('#color-chooser > li > a').click(function (e) {
                            e.preventDefault()
                            //Save color
                            currColor = $(this).css('color')
                            //Add color effect to button
                            $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
                            })
                            
                            $('#add-new-event').click(function (e) {
                            e.preventDefault()
                            //Get value and make sure it is not null
                            var val = $('#new-event').val()
                            if (val.length == 0) {
                                return
                            }
                        
                            //Create events
                            var event = $('<div />')
                            event.css({
                                'background-color': currColor,
                                'border-color'    : currColor,
                                'color'           : '#fff'
                            }).addClass('external-event')
                            event.html(val)
                            $('#external-events').prepend(event)
                        
                            //Add draggable funtionality
                            init_events(event)
                        
                            //Remove event from text input
                            $('#new-event').val('')
                            })


                        


                }else{
                    alert("Failed");
                }
          }        
        });

         

    });
    
</script>

@stop