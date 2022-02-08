 @extends('layout.taxi_layout')
 @section('content')
    
   
    <div class="col-md-8 col-sm-12 clearfix mt-1 mb-5">
     <a href="/care-taxi/booking" class="pr-1 text-dark float-right">カレンダーに戻る</a>
    <div class ="d-flex justify-content-between mt-5">
    @if($not_current)    
    <a href="/care-taxi/slot/edit/{{$id}}/{{$previous_date}}" class="text-dark pr-1"><i class="fas fa-3x fa-caret-left text-secondary"></i></a>
    @else
     <span class="text-dark pr-1"><i class="fas fa-3x fa-caret-left text-secondary"></i></span>
    @endif
    <span style="font-size: 20px;line-height:2.1">{{$date_jp}}</span>
    <a href="/care-taxi/slot/edit/{{$id}}/{{$next_date}}" class="text-dark pr-1"><i class="fas fa-3x fa-caret-right text-secondary"></i></a>
    
    </div>
         {{-- <h3 class=""><a href="/care-taxi/slot/{{$id}}/{{$date}}" class="text-dark pr-1"></a></h3> --}}
    
    <form action="/care-taxi/status/update"  method="POST">
        @csrf
        
        <input type="submit" class="btn btn-warning btn-block mb-1" value="更新" />
        <input type="hidden" name="id" value="{{$id}}" /></td>
         <input type="hidden" name="date" value="{{$date}}" /></td>
        <table class="table table-hover table-bordered bg-light" style="margin-bottom: 0px !important">
            <th>時間</th>
            <th>空き状況</th>
            <th>コメント</th>
        <tbody>
            @foreach ($time as $key => $t)
            <tr>
                <td style="width: 100px">{{ date('H:i', strtotime($t["time"]))}}</td>
                <td style="width: 200px">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input circle" type="radio" name="status-{{$t["time"]}}" id="inlineRadio1" value="circle"
                         @if($t["status"] == 'circle')
                        {{'checked'}} 
                        @endif
                        >
                        <label class="form-check-label" for="inlineRadio1">
                            <span class="text-info">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                            <circle cx="8" cy="8" r="8"/>
                            </svg>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input triangle" type="radio" name="status-{{$t["time"]}}" id="triangle" value="triangle"
                        @if($t["status"] == 'triangle')
                        {{'checked'}} 
                        @endif
                        >
                        <label class="form-check-label" for="inlineRadio2">
                            <span class="text-warning">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-triangle-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M7.022 1.566a1.13 1.13 0 0 1 1.96 0l6.857 11.667c.457.778-.092 1.767-.98 1.767H1.144c-.889 0-1.437-.99-.98-1.767L7.022 1.566z"/>
                            </svg>
                            </span>
                        </label>
                        </div>
                        <div class="form-check form-check-inline">
                        <input class="form-check-input times" type="radio" name="status-{{$t["time"]}}" id="inlineRadio3" value="times"
                        @if($t["status"] == 'times')
                        {{'checked'}} 
                        @endif
                        >
                        <label class="form-check-label" for="inlineRadio3">
                            <span class="text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            </span>
                        </label>
                        </div>
                </td>
                <td >
                    <div class="">
                    <input type="text" class="form-control status-{{$t["time"]}} @if($t["status"] != 'triangle')
                        {{'hide'}} 
                        @endif" id="status-{{$t["time"]}}" name="comment-{{$t["time"]}}" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$t["comment"]}}" >
                </div>
                </td>
            </tr>
            @endforeach
           
           </tbody>
        </table>
        <input type="submit" class="btn btn-warning btn-block mt-1" value="更新" />
    </form>
     </div>
 
 
 @endsection