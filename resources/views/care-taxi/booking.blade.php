 @extends('layout.taxi_layout')
 @section('content')
 <div class="container ">
     <div class="col-md-12 col-sm-12 clearfix m-5">
         <div class="mb-3" >    
         <a href="/care-taxi" class="text-dark mr-2"><i class="fas fa-3x fa-caret-left text-secondary"></i></a>
        <h3 class="d-inline">空き状況確認・登録</h3>
         </div>
        {{--  <div class="flex align-content-md-center">    
         <a href="/care-taxi" class="text-dark"><i class="fas fa-3x fa-caret-left text-secondary"></i></a><h3 class="text-center mb-2">Available Slot</h3> --}}

        <div id='full_calendar_events' class="bg-light"></div>
         </div>
    </div>
     </div>
 </div>
 
 @endsection
 
