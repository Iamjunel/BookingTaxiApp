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
                <p class="text-dark text-center h3 mt-0 ">
                    <span class="">{{$time}}
                    </span>
                <span class="ml-1">
                    空き状況 :
                    @if($status == "circle")
                   
                        <span class="text-info">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                            <circle cx="8" cy="8" r="8"/>
                        </svg>
                        </span>
                        </a>
                   
                    @elseif($status == "triangle")
                    
                        <span class="text-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-triangle-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M7.022 1.566a1.13 1.13 0 0 1 1.96 0l6.857 11.667c.457.778-.092 1.767-.98 1.767H1.144c-.889 0-1.437-.99-.98-1.767L7.022 1.566z"/>
                        </svg>
                        </span>
                        </a>
                    
                    @elseif($status == "times")
                    
                         <span class="text-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                            </svg>
                            </span>
                            </a>
                    
                    @endif
                </span>
                </p>   
                </div>
                @if(isset($company_status->status) && $company_status->status == "triangle")
                <div class="border p-4 my-2 ">
                    <p class="ml-3">コメント</p>
                    <div class=" ml-5 mr-5 p-5" style="background-color: #b8b7b7;border-radius:5px">
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
        {{-- details --}}
        <div class="row mt-2 ">
            @if(empty($company_images))
            <div class="container col-md-12 col-sm-12 border px-0">
            <img src="https://www.nuvali.ph/wp-content/themes/consultix/images/no-image-found-360x250.png" class="img-fluid" style="height:300px"/>
            </div>
            @else
            <div class="container col-md-12 col-sm-12 border px-0">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                    @foreach( $company_images as $photo )
                        <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
                    @endforeach
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        @foreach( $company_images as $photo )
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img class="d-block img-fluid" src="{{ asset('images/'.$photo->url) }}" alt="{{ $photo->url }}">
                                
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon text-dark" aria-hidden="true"></span>
                        <span class="sr-only ">Previous</span>
                    </a>
                    <a class="carousel-control-next " href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon text-dark" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            @endif
        </div>
        <div class="row ">
            <div class="col-md-12 col-sm-12 px-0">
                <table class="table table-striped table-hover table-bordered">
                <tbody>
                    <tr>
                        <td colspan="2" class="text-center">{{$company->name}}</td>
                    </tr>   
                    <tr>
                    <td>会社名</td>
                    <td>{{$company->name}}</td>
                    </tr>
                    <tr>
                    <td>代表者</td>
                    <td>{{$company->in_charge}}</td>
                    </tr>
                    <tr>
                    <td>住所</td>
                    <td>{{$company->address}}</td>
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
                    <td>E-mail</td>
                    <td>{{$company->email}}</td>
                    </tr>
                    <tr>
                    <td>HP</td>
                     <td><a href="{{$company->hp}}" target="_blank">{{$company->hp}}</a></td>
                    </tr>
                    <tr>
                                    <td>電話対応時間</td>
                                    <td>
                                        
                                    <input type="time" name="call_start" value="{{$company->call_start}}" disabled/> <span style="font-size:18px;font-weight:600;font-family: emoji">~</span> <input type="time" name="call_end" value="{{$company->call_end}}"  disabled/>
                                       
                                    </td>

                                </tr>
                    <tr>
                                        <td className="align-middle">営業時間</td>
                                        <td className="p-1 m-0 pb-2" style="width: 900px">
                                            <table>
                                                <tr>
                                                    <td style="width: 100px">月曜日</td>
                                                    <td><input type="time" name="mon_start" value="{{$bh->monday_start}}" disabled/></td> 
                                                    <td><span style="font-size:18px;font-weight:600;font-family: emoji">~</span></td> 
                                                    <td><input type="time" name="mon_end" value="{{$bh->monday_end}}" disabled /></td>
                                                </tr>
                                                <tr>
                                                    <td>火曜日</td>
                                                    <td><input type="time" name="tue_start" value="{{$bh->tuesday_start}}" disabled /></td> 
                                                    <td><span style="font-size:18px;font-weight:600;font-family: emoji">~</span></td> 
                                                    <td><input type="time"  name="tue_end" value="{{$bh->tuesday_end}}"  disabled/></td>
                                                </tr>
                                                <tr>
                                                    <td>水曜日</td>
                                                    <td><input type="time" name="wed_start" value="{{$bh->wednesday_start}}"  disabled /></td>
                                                    <td><span style="font-size:18px;font-weight:600;font-family: emoji">~</span></td> 
                                                    <td><input type="time" name="wed_end"  value="{{$bh->wednesday_end}}" disabled /></td>
                                                </tr>
                                                <tr>
                                                    <td>木曜日</td>
                                                    <td><input type="time" name="thu_start" value="{{$bh->thursday_start}}" disabled /></td>
                                                    <td><span style="font-size:18px;font-weight:600;font-family: emoji">~</span></td> 
                                                    <td><input type="time" name="thu_end"  value="{{$bh->thursday_end}}" disabled/></td>
                                                </tr>
                                                <tr>
                                                    <td>金曜日</td>
                                                    <td><input type="time" name="fri_start"  value="{{$bh->friday_start}}" disabled /></td>
                                                    <td><span style="font-size:18px;font-weight:600;font-family: emoji">~</span></td> 
                                                    <td><input type="time" name="fri_end" value="{{$bh->friday_end}}" disabled /></td>
                                                </tr>
                                                <tr>
                                                    <td>土曜日</td>
                                                    <td><input type="time" name="sat_start" value="{{$bh->saturday_start}}" disabled /></td>
                                                    <td><span style="font-size:18px;font-weight:600;font-family: emoji">~</span></td> 
                                                    <td><input type="time" name="sat_end" value="{{$bh->saturday_end}}"  disabled /></td>
                                                </tr>
                                                <tr>
                                                    <td>日曜日</td>
                                                    <td><input type="time" name="sun_start"  value="{{$bh->sunday_start}}" disabled/></td>
                                                    <td><span style="font-size:18px;font-weight:600;font-family: emoji">~</span></td> 
                                                    <td><input type="time" name="sun_end"   value="{{$bh->sunday_end}}" disabled/></td>
                                                </tr>
                                            </table>
                                        </td>
                                    


                                </tr>
                                <tr>
                                        <td className="align-middle">サービス</td>
                                        <td className="p-1 m-0 pb-2" style="width: 400px">
                                            <table>
                                                <tr>
                                                    <td style="width: 100px">看護</td>
                                                    <td style="width: 300px">
                                                        
                                                        
                                                        @if($company->nursing_status == 'circle')
                                                        <div class="form-check form-check-inline">
                                                        <label class="form-check-label" for="inlineRadio1">
                                                            <span class="text-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                            <circle cx="8" cy="8" r="8"/>
                                                            </svg>
                                                            </span>
                                                        </label>
                                                         @endif
                                                        </div>
                                                        
                                                        @if($company->nursing_status == 'triangle')
                                                        <div class="form-check form-check-inline">
                                                        <label class="form-check-label" for="inlineRadio2">
                                                            <span class="text-warning">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-triangle-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M7.022 1.566a1.13 1.13 0 0 1 1.96 0l6.857 11.667c.457.778-.092 1.767-.98 1.767H1.144c-.889 0-1.437-.99-.98-1.767L7.022 1.566z"/>
                                                            </svg>
                                                            </span>
                                                        </label>
                                                        @endif
                                                        @if($company->nursing_status == 'times')
                                                        <div class="form-check form-check-inline">
                                                        <label class="form-check-label" for="inlineRadio3">
                                                            <span class="text-danger">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                            </svg>
                                                            </span>
                                                        </label>
                                                        </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ヘルパー</td>
                                                    <td style="width: 300px">
                                                        @if($company->helper_status== 'circle')
                                                        <div class="form-check form-check-inline">
                                                        
                                                        
                                                        
                                                        <label class="form-check-label" for="inlineRadio1">
                                                            <span class="text-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                            <circle cx="8" cy="8" r="8"/>
                                                            </svg>
                                                            </span>
                                                        </label>
                                                        </div>
                                                        @endif
                                                        @if($company->helper_status == 'triangle')
                                                        <div class="form-check form-check-inline">
                                                        
                                                        
                                                        
                                                        <label class="form-check-label" for="inlineRadio2">
                                                            <span class="text-warning">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-triangle-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M7.022 1.566a1.13 1.13 0 0 1 1.96 0l6.857 11.667c.457.778-.092 1.767-.98 1.767H1.144c-.889 0-1.437-.99-.98-1.767L7.022 1.566z"/>
                                                            </svg>
                                                            </span>
                                                        </label>
                                                        </div>
                                                        @endif
                                                         @if($company->helper_status == 'times')
                                                        <div class="form-check form-check-inline">
                                                       
                                                       
                                                        
                                                        <label class="form-check-label" for="inlineRadio3">
                                                            <span class="text-danger">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                            </svg>
                                                            </span>
                                                        </label>
                                                        </div>
                                                         @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>酸素</td>
                                                    <td style="width: 300px">
                                                        @if($company->oxygen_status == 'circle')
                                                         <div class="form-check form-check-inline">
                                                        <label class="form-check-label" for="inlineRadio1">
                                                            <span class="text-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                            <circle cx="8" cy="8" r="8"/>
                                                            </svg>
                                                            </span>
                                                        </label>
                                                         </div>
                                                          @endif
                                                        
                                                        @if($company->oxygen_status == 'triangle')
                                                        <div class="form-check form-check-inline">
                                                        
                                                        
                                                        
                                                        <label class="form-check-label" for="inlineRadio2">
                                                            <span class="text-warning">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-triangle-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M7.022 1.566a1.13 1.13 0 0 1 1.96 0l6.857 11.667c.457.778-.092 1.767-.98 1.767H1.144c-.889 0-1.437-.99-.98-1.767L7.022 1.566z"/>
                                                            </svg>
                                                            </span>
                                                        </label>
                                                        </div>
                                                        @endif
                                                         @if($company->oxygen_status == 'times')
                                                        <div class="form-check form-check-inline">
                                                        
                                                       
                                                        
                                                        <label class="form-check-label" for="inlineRadio3">
                                                            <span class="text-danger">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                            </svg>
                                                            </span>
                                                        </label>
                                                        </div>
                                                         @endif
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>人工呼吸器</td>
                                                    <td style="width: 300px">
                                                        @if($company->ventilator_status == 'circle')
                                                        <div class="form-check form-check-inline">
                                                        
                                                        
                                                        
                                                        <label class="form-check-label" for="inlineRadio1">
                                                            <span class="text-info">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-circle-fill" viewBox="0 0 16 16">
                                                            <circle cx="8" cy="8" r="8"/>
                                                            </svg>
                                                            </span>
                                                        </label>
                                                        </div>
                                                        @endif
                                                        @if($company->ventilator_status == 'triangle')
                                                        <div class="form-check form-check-inline">
                                                       
                                                        
                                                        
                                                        <label class="form-check-label" for="inlineRadio2">
                                                            <span class="text-warning">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-triangle-fill" viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd" d="M7.022 1.566a1.13 1.13 0 0 1 1.96 0l6.857 11.667c.457.778-.092 1.767-.98 1.767H1.144c-.889 0-1.437-.99-.98-1.767L7.022 1.566z"/>
                                                            </svg>
                                                            </span>
                                                        </label>
                                                        </div>
                                                        @endif
                                                        @if($company->ventilator_status == 'times')
                                                        <div class="form-check form-check-inline">
                                                
                                                        
                                                        
                                                        <label class="form-check-label" for="inlineRadio3">
                                                            <span class="text-danger">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                                            </svg>
                                                            </span>
                                                        </label>
                                                        </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                                
                                            </table>
                                        </td>
                                    


                                </tr>
                                <tr>
                    <td colspan="2"><pre><span class="pt-5 pb-5">{{$company->notes}}</span></pre></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
     </div>
 </div>
 
 @endsection