 @extends('layout.user_layout')
 @section('content')
 <div class="container">
     <div class="col-md-12 col-sm-12 clearfix">
       
        <div class="row ">
            <div class="container col-md-12 col-sm-12 clearfix border p-5">
                {{-- <table class="table table-striped table-hover table-bordered">
                <tbody>
                    <tr>
                        <td colspan="2" class="text-center">{{$company->name}}</td>
                    </tr>   

                    <tr>
                    <td>住所</td>
                    <td>{{$company->address}}</td>
                    </tr>
                    <tr>
                    <td>Eメール</td>
                    <td>{{$company->email}}</td>
                    </tr>
                    <tr>
                    <td>電話</td>
                    <td>{{$company->phone}}</td>
                    </tr>
                    <tr>
                    <td>FAX</td>
                    <td>{{$company->fax}}</td>
                    </tr>
                    <tr>
                    <td>HP</td>
                    <td>{{$company->hp}}</td>
                    </tr>
                </tbody>
                </table> --}}
                <div class="p-2">
                <h3 class="text-center mx-2">{{$company->name}}</h3>
                <div class="row justify-content-center">
                   <button class="btn btn-primary my-2" onclick="callANumber('tel:{{$company->phone}}')">電話をかける</button>
                </div>
                 <p class="text-dark text-center fw-bold">{{$company->phone}}</p>   
                </div>
                <hr/>
                <div class="p-2" style="text-align:center">
                <h3 class="text-center mx-2">{{$date_jp}}</h3>
                <p class="text-dark text-center ">
                    <span>時間:{{$time}}
                    </span>
                <span class="ml-4">
                    空き状況 :
                    @if($status == "circle")
                   
                        <span class="text-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                            <circle cx="8" cy="8" r="8"/>
                        </svg>
                        </span>
                        </a>
                   
                    @elseif($status == "triangle")
                    
                        <span class="text-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-triangle-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.022 1.566a1.13 1.13 0 0 1 1.96 0l6.857 11.667c.457.778-.092 1.767-.98 1.767H1.144c-.889 0-1.437-.99-.98-1.767L7.022 1.566z"/>
                        </svg>
                        </span>
                        </a>
                    
                    @elseif($status == "times")
                    
                         <span class="text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            </span>
                            </a>
                    
                    @endif
                </span>
                </p>   
                </div>
                @if(isset($company_status->status) && $status == "triangle")
                <div class="border p-4 my-2 ">
                    <p class="ml-3">コメント</p>
                    <div class="btn ml-5 mr-5 p-5 w-75" style="background-color: #b8b7b7">
                        {{$company_status->comment}}
                    </div>
                </div>
                @endif
                <div class="bg-danger p-3 my-2 text-center text-white">
                    <p>空き状況は随時変わります。
                    必ずお電話にてご確認ください。
                    </p>
                </div>
                <div class="border" style="text-align:left">
                    <p class="ml-2"> 予約の際は以下の必要事項をご準備ください。</p>
                    <ol >    
                    <li>希望日時</li>
                    <li>出発・目的地（病棟名）</li>    
                    <li>患者様氏名</li>  
                    <li>同乗者の有無</li>    
                    <li>使用機材（車いす・リクライニング・ストレッチャー）</li>    
                    <li>使用備品（酸素・吸引機など）</li>    
                    <li>連絡先（キーパーソン）</li>    
                    <li>患者様の状態</li>    
                    </ol>
                </div>
                <div class="row justify-content-center">
                    <a href="/user/slot/{{$date}}" class="btn btn-danger my-2">{{$date_jp}} スケジュール確認</a>
                </div>
                <hr/>
                 <div class="row justify-content-center">
                   <a href="tel:{{$company->phone}}" class="btn btn-primary my-2">電話をかける</a>
                </div>
                
            </div>
        </div>
     </div>
 </div>
 
 @endsection