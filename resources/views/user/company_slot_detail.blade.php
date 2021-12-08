 @extends('layout.user_layout')
 @section('content')
 
     
    <div class="col-md-8 col-sm-12 clearfix mt-1 mb-5">
        <a href="/user/companylist" class="pr-1 text-dark float-right">会社リストに戻る</a>
        <div class ="d-flex justify-content-between mt-5">
        @if($not_current)    
        <a href="/user/slot/detail/{{$id}}/{{$previous_date}}" class="text-dark pr-1"><i class="fas fa-3x fa-caret-left text-secondary"></i></a>
        @else
        <span class="text-dark pr-1"><i class="fas fa-3x fa-caret-left text-secondary"></i></span>
        @endif
        <span style="font-size: 18px">{{$date_jp}}</span>
        <a href="/user/slot/detail/{{$id}}/{{$next_date}}" class="text-dark pr-1"><i class="fas fa-3x fa-caret-right text-secondary"></i></a>
        
    </div>
    <h3>{{$com->name}}</h3>
    
        <table class="table table-hover table-bordered bg-light">
            <th><br>時間</th>
            <th>{{date('m月d日',strtotime($date))}}<br>月曜日</th>
            <th>{{date('m月d日',strtotime('+1days',strtotime($date)))}}<br>火曜日</th>
             <th>{{date('m月d日',strtotime('+2days',strtotime($date)))}}<br>水曜日</th>
              <th>{{date('m月d日',strtotime('+3days',strtotime($date)))}}<br>木曜日</th>
              <th>{{date('m月d日',strtotime('+4days',strtotime($date)))}}<br>金曜日</th>
              <th>{{date('m月d日',strtotime('+5days',strtotime($date)))}}<br>土曜日</th>
              <th>{{date('m月d日',strtotime('+6days',strtotime($date)))}}<br>日曜日</th>
        <tbody>
            @foreach ($time as $key => $t)
            <tr>
                <td style="width: 100px">{{$t["time"]}}</td>
                @for($day = 0; $day < 7;$day++)
                    @if($day > 0)
                        @php $curr_date = date('Y-m-d',strtotime('+'.$day.'days',strtotime($date))); @endphp
                    @else
                        @php $curr_date = $date; @endphp
                    @endif
                    @if($t["status_$curr_date"] != null)
                    @if($t["status_$curr_date"] =="circle")
                    <td style="width: 100px" >
                    <a href="/user/contact/{{$id}}/{{$date}}/{{$t["time"]}}/{{$t["status_$curr_date"]}}"> 
                    <span class="text-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                        <circle cx="8" cy="8" r="8"/>
                    </svg>
                    </span>
                    </a>
                    </td>
                    @elseif($t["status_$curr_date"] =="triangle")
                    <td style="width: 100px" >
                    <a href="/user/contact/{{$id}}/{{$date}}/{{$t["time"]}}/{{$t["status_$curr_date"]}}"> 
                    <span class="text-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-triangle-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M7.022 1.566a1.13 1.13 0 0 1 1.96 0l6.857 11.667c.457.778-.092 1.767-.98 1.767H1.144c-.889 0-1.437-.99-.98-1.767L7.022 1.566z"/>
                                </svg>
                                </span>
                    </a>
                    </td>
                    @else
                        <td style="background-color: darkgrey;width:100px"></td>
                
                @endif
           
                    @else
                    <td style="background-color: darkgrey;width:100px"></td>
                    @endif
                @endfor 
                  
                
                
            </tr>
            @endforeach
           
           </tbody>
        </table>
    
     </div>
 
 
 @endsection