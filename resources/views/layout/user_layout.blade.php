<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{env('APP_NAME')}}</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.6/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .fc-past {
    background-color: rgb(231, 230, 230);
}

        </style>
         
</head>
<body style="overflow:auto">
    <nav class="container pt-2">
        <a href="/" class="text-dark" style="text-decoration: none">Booking App System</a>
        
    </nav>
    <hr/>
    <div class="">
        <div class="row justify-content-center pt-2">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
        </div>
        <div class="row justify-content-center">
            
           

           @yield('content')
     </div>
    </div> 

 
 <script src="{{ asset('js/app.js') }}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.6/fullcalendar.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

 <script>
     $('div.alert').delay(3000).slideUp(300);
     </script>

      <script>
        $(document).ready(function () {

            var SITEURL = "{{ url('/') }}";
            //var id = {{Session::get('id')}};
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var calendar = $('#full_calendar_events').fullCalendar({
                header: {
                    // title, prev, next, prevYear, nextYear, today
                    left: 'prev',
                    center: 'title ',
                    right: 'next'
                },
                monthNames: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                // 月略称
                monthNamesShort: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                // 曜日名称
                dayNames: ['日曜日', '月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日'],
                // 曜日略称
                dayNamesShort: ['日', '月', '火', '水', '木', '金', '土'],
                editable: false,
                locale: 'es',
                editable: false,
                selectable: true,
                selectHelper: true,
                selectAllow: function(info) {
                        if (info.start.isBefore(moment().subtract(1, 'days')))
                            return false; 
                        return true;          
                },
                select: function (date,event_start, event_end, allDay) {
                       // var this_day = $.fullCalendar.formatDate(date, "Y-MM-DD");
                       var this_day = moment(date, 'DD.MM.YYYY').format('YYYY-MM-DD')
                 window.location.href = '/user/slot/' + this_day;
                    
                },
                views: {
                    month: { // name of view
                    titleFormat: 'YYYY/MM'
                    // other view-specific options here
                    }
                }

        
                /* eventDrop: function (event, delta) {
                    var event_start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var event_end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                    $.ajax({
                        url: SITEURL + '/calendar-crud-ajax',
                        data: {
                            title: event.event_name,
                            start: event_start,
                            end: event_end,
                            id: event.id,
                            type: 'edit'
                        },
                        type: "POST",
                        success: function (response) {
                            displayMessage("Event updated");
                        }
                    });
                }, */
                /* eventClick: function (event) {
                    var eventDelete = confirm("Are you sure?");
                    if (eventDelete) {
                        $.ajax({
                            type: "POST",
                            url: SITEURL + '/calendar-crud-ajax',
                            data: {
                                id: event.id,
                                type: 'delete'
                            },
                            success: function (response) {
                                calendar.fullCalendar('removeEvents', event.id);
                                displayMessage("Event removed");
                            }
                        });
                    }
                } */
            });
        });
        
        function displayMessage(message) {
            toastr.success(message, 'Event');            
        }

    </script>
</body>
</html>
   