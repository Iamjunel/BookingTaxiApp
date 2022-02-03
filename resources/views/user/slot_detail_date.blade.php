 @extends('layout.user_layout')
 @section('content')
     
     <div class="col-md-10 col-sm-10 clearfix p-5">
         <div class="row m-1 float-right">
             {{-- back to calendar --}}
             <a href="/user/slot" class="btn btn-light text-dark border-dark t">カレンダーへ戻る</a>
         </div>
         <div class="clearfix"></div>
         <div class ="d-flex justify-content-between mt-5 ">
        @if($not_current)    
        <a href="/user/slot/{{$previous_date}}" class="text-dark pr-1"><i class="fas fa-3x fa-caret-left text-secondary"></i></a>
        @else
        <span class="text-dark pr-1"><i class="fas fa-3x fa-caret-left text-secondary"></i></span>
        @endif
        <span style="font-size: 18px">{{$date_jp}}</span>   
        <a href="/user/slot/{{$next_date}}" class="text-dark pr-1"><i class="fas fa-3x fa-caret-right text-secondary"></i></a>
             
    </div>
        
     <div class="row " >
         <div class="container col-md-12 col-sm-12 ">
         <div class="col-md-12 col-sm-12 border mb-1 text-center"> 
             <h4 class="text-center text-danger">利用可能なサービス</h4>   
         <span class="text-primary mr-5"><i class="fab fa-accessible-icon "></i> -- 看護/介護</span>
         <span class="text-info mr-5"><i class="fas fa-user-nurse"></i> -- ヘルパー</span>
         <span class="text-success mr-5"><i class="fas fa-lungs"></i> -- 酸素</span>
         <span class="text-danger mr-5"><i class="fas fa-procedures"></i> -- 人工呼吸器</span>
         

         </div>
         </div>
     </div>
    <form action="/care-taxi/company/update/"  method="POST" >
        @csrf
        
       {{--  <input type="submit" class="btn btn-primary float-right" value="アップデート" /> --}}
        {{-- <input type="hidden" name="id" value="{{$company->id}}" /></td> --}}
        <table class="table table-hover table-bordered bg-light" >
            <thead class="sticky-top bg-light">
            <th style="width: 100px;position:sticky;left:0px" class="bg-light" >時間</th>
            @foreach ($comp_list as $com)
            <th class="text-center text-break" style="min-width:100px" ><a class="text-dark" href="/user/company/detail/{{$com->id}}">{{$com->name}}</a><br>
            @if($com->nursing_status != "times" )
            <span class="text-primary"><i class="fab fa-accessible-icon "></i></span>
            @endif
            @if($com->helper_status != "times" )
             <span class="text-info"><i class="fas fa-user-nurse"></i></span>
            @endif
             @if($com->oxygen_status != "times" )
             <span class="text-success "><i class="fas fa-lungs"></i></span>
            @endif
            @if($com->ventilator_status != "times" )
             <span class="text-danger "><i class="fas fa-procedures"></i> </span>
            @endif
            </th>
       
           @endforeach
            </thead>
        <tbody style="overflow:auto!important">
            @foreach ($time as $key => $t)
            <tr>
                <td style="" class="">{{ date('H:i', strtotime($t["time"]))}}</td>
                 @foreach ($comp_list as $com)
                 @if(isset($t["status_".$com->id]))
                    @if($t["status_".$com->id] == "circle")
                    <td class="text-center"><a href="/user/contact/{{$com->id}}/{{$date}}/{{$t["time"]}}/{{$t["status_".$com->id]}}"> 
                        <div class="text-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                            <circle cx="8" cy="8" r="8"/>
                        </svg>
                    </div>
                        </a>
                    </td>
                    @elseif($t["status_".$com->id] == "triangle")
                    <td class="text-center"><a href="/user/contact/{{$com->id}}/{{$date}}/{{$t["time"]}}/{{$t["status_".$com->id]}}"> 
                        <div class="text-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-triangle-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.022 1.566a1.13 1.13 0 0 1 1.96 0l6.857 11.667c.457.778-.092 1.767-.98 1.767H1.144c-.889 0-1.437-.99-.98-1.767L7.022 1.566z"/>
                        </svg>
                    </div>
                        </a>
                    </td>
                    @elseif($t["status_".$com->id] == "times")
                    <td style="background-color: darkgrey"></td>
                    @endif
                    
                 @else
                    <td style="background-color: darkgrey"></td>
                 @endif

                 @endforeach
               
                
            </tr>
            @endforeach
           
           </tbody>
        </table>
    </form>
     </div>
 
 
 @endsection