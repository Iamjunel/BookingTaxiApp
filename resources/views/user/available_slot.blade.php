 @extends('layout.user_layout')
 @section('content')
 <div class="container ">
     <div class="col-md-12 col-sm-12 clearfix m-5">
         <div class="flex align-content-md-center">    
         <h3 class="text-center mb-2"><a href="/user" className="text-dark"><i class="fas fa-2x fa-caret-left text-secondary mr-1"></i></a>空き状況確認</h3>

        <div id='full_calendar_events' class="bg-light"></div>
         </div>
    </div>
     </div>
 </div>
 
 @endsection
 
