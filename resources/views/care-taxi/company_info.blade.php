 @extends('layout.taxi_layout')
 @section('content')
 
     <div class="col-md-8 col-sm-12 clearfix p-5">
          <div class="float-left">
              <a class="text-dark pr-1"><i class="fas fa-3x fa-caret-left text-secondary"></i></a>
              <h3 class="float-right" style="line-height: 1.8">{{$company->name}}</h3>
          </div>
         <form action="/care-taxi/company/update"  method="POST" enctype="multipart/form-data">
        @csrf
        
        <input type="submit" class="btn btn-primary float-right" value="更新" />
        <input type="hidden" name="id" value="{{$company->id}}" /></td>
        <table class="table table-striped table-hover table-bordered bg-light">
        <tbody>
            <tr>
                                    <td style="width: 100px">ID</td>
                                    <td><input type="text" name="cid" value="{{$company->cid}}" /></td>
                                </tr>
                                <tr>
                                    <td>パスワード</td>
                                        <td><input type="password" name="cpass" value="{{$company->cpass}}" /></td>
                                </tr>
                                 <tr>
                                    <td>タクシー会社名</td>
                                        <td><input type="text" name="name" value="{{$company->name}}"/></td>

                                </tr>
                                <tr>
                                    <td>名称略</td>
                                        <td><input type="text" name="alias" value="{{$company->alias}}" maxlength="5"/></td>

                                </tr>
                                <tr>
                                    <td>代表者</td>
                                        <td><input type="text" name="in_charge" value="{{$company->in_charge}}" /></td>

                                </tr>
                                <tr>
                                    <td>生年月</td>
                                        <td>
                                           <input id="bao" type="text" name="dob" value="{{$company->dob}}" />
                                        </td>

                                </tr>
                                <tr>
                                    <td>資格</td>
                                        <td><textarea name="qualification" rows="4" cols="50" >{{$company->qualification}}</textarea></td>

                                </tr>
                                <tr>
                                    {{-- profile --}}
                                    <td>プロフィール</td>
                                        <td><textarea name="profile" rows="4" cols="50" >{{$company->profile}}</textarea></td>

                                </tr>
                                
                                <tr>
                                    <td>住所</td>
                                        <td><input type="text" name="address" value="{{$company->address}}"/></td>

                                </tr>
                                 <tr>
                                    <td>電話番号 1</td>
                                        <td><input type="text" inputmode="numeric" name="phone" value="{{$company->phone}}" onChange="halfWidth(this)"/></td>

                                </tr>
                                <tr>
                                    {{-- phone 2 --}}
                                    <td>電話番号 2</td>
                                        <td><input type="text" inputmode="numeric" name="phone2" value="{{$company->phone2}}" onChange="halfWidth(this)"/></td>

                                </tr>
                                <tr>
                                    <td>FAX</td>
                                        <td><input type="text" name="fax" value="{{$company->fax}}" onChange="halfWidth(this)"/></td>

                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                        <td><input type="email" name="email" value="{{$company->email}}" onChange="halfWidth(this)" /></td>

                                </tr>
                                <tr>
                                    <td>HP</td>
                                        <td><input type="url" name="hp" class="col-8 pl-0" value="{{$company->hp}}" onChange="halfWidth(this)"/></td>

                                </tr>
                                <tr>
                                    {{-- accreditation --}}
                                    <td>認定・許可・所属団体</td>
                                        <td><textarea name="accreditation" rows="4" cols="50" >{{$company->accreditation}}</textarea></td>

                                </tr>
                                <tr>
                                    <td>電話対応時間</td>
                                    <td>
                                        
                                    <input type="time" name="call_start" value="{{$company->call_start}}"/> <span style="font-size:18px;font-weight:600;font-family: emoji">~</span> <input type="time" name="call_end" value="{{$company->call_end}}" />
                                       
                                    </td>

                                </tr>
                                
                                
                                 
                                <tr>
                                        <td className="align-middle">営業時間</td>
                                        <td className="p-1 m-0 pb-2" style="width: 400px">
                                            <table>
                                                <tr>
                                                    <td style="width: 100px">月曜日</td>
                                                    <td><input type="time" name="mon_start" value="{{$bh->monday_start}}" /></td> 
                                                    <td><span style="font-size:18px;font-weight:600;font-family: emoji">~</span></td> 
                                                    <td><input type="time" name="mon_end" value="{{$bh->monday_end}}"  /></td>
                                                </tr>
                                                <tr>
                                                    <td>火曜日</td>
                                                    <td><input type="time" name="tue_start" value="{{$bh->tuesday_start}}"  /></td> 
                                                    <td><span style="font-size:18px;font-weight:600;font-family: emoji">~</span></td> 
                                                    <td><input type="time"  name="tue_end" value="{{$bh->tuesday_end}}" /></td>
                                                </tr>
                                                <tr>
                                                    <td>水曜日</td>
                                                    <td><input type="time" name="wed_start" value="{{$bh->wednesday_start}}"  /></td>
                                                    <td><span style="font-size:18px;font-weight:600;font-family: emoji">~</span></td> 
                                                    <td><input type="time" name="wed_end"  value="{{$bh->wednesday_end}}" /></td>
                                                </tr>
                                                <tr>
                                                    <td>木曜日</td>
                                                    <td><input type="time" name="thu_start" value="{{$bh->thursday_start}}"  /></td>
                                                    <td><span style="font-size:18px;font-weight:600;font-family: emoji">~</span></td> 
                                                    <td><input type="time" name="thu_end"  value="{{$bh->thursday_end}}"/></td>
                                                </tr>
                                                <tr>
                                                    <td>金曜日</td>
                                                    <td><input type="time" name="fri_start"  value="{{$bh->friday_start}}" /></td>
                                                    <td><span style="font-size:18px;font-weight:600;font-family: emoji">~</span></td> 
                                                    <td><input type="time" name="fri_end" value="{{$bh->friday_end}}" /></td>
                                                </tr>
                                                <tr>
                                                    <td>土曜日</td>
                                                    <td><input type="time" name="sat_start" value="{{$bh->saturday_start}}" /></td>
                                                    <td><span style="font-size:18px;font-weight:600;font-family: emoji">~</span></td> 
                                                    <td><input type="time" name="sat_end" value="{{$bh->saturday_end}}"   /></td>
                                                </tr>
                                                <tr>
                                                    <td>日曜日</td>
                                                    <td><input type="time" name="sun_start"  value="{{$bh->sunday_start}}" /></td>
                                                    <td><span style="font-size:18px;font-weight:600;font-family: emoji">~</span></td> 
                                                    <td><input type="time" name="sun_end"   value="{{$bh->sunday_end}}" /></td>
                                                </tr>
                                            </table>
                                        </td>
                                    


                                </tr>
                                <tr>
                                    <td>紹介メッセージ</td>
                                        <td><textarea name="notes" rows="4" cols="50" >{{$company->notes}}</textarea></td>

                                </tr>
                                <tr>
                                        <td className="align-middle">サービス</td>
                                        <td className="p-1 m-0 pb-2" style="width: 400px">
                                            <table>
                                                <tr>
                                                    {{-- wheelchair 1 --}}
                                                    <td>車いす</td>
                                                    <td style="width: 300px">
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="wheelchair_status" id="inlineRadio1" value="circle"
                                                        @if($company->wheelchair_status == 'circle')
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
                                                        <input class="form-check-input" type="radio" name="wheelchair_status" id="inlineRadio2" value="triangle"
                                                        @if($company->wheelchair_status == 'triangle')
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
                                                        <input class="form-check-input" type="radio" name="wheelchair_status" id="inlineRadio3" value="times"
                                                        @if($company->wheelchair_status == 'times')
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
                                                </tr>
                                                <tr>
                                                    {{-- re_wheelchair  2 --}}
                                                    <td>リクライニング車いす</td>
                                                    <td style="width: 300px">
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="re_wheelchair_status" id="inlineRadio1" value="circle"
                                                        @if($company->re_wheelchair_status == 'circle')
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
                                                        <input class="form-check-input" type="radio" name="re_wheelchair_status" id="inlineRadio2" value="triangle"
                                                        @if($company->re_wheelchair_status == 'triangle')
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
                                                        <input class="form-check-input" type="radio" name="re_wheelchair_status" id="inlineRadio3" value="times"
                                                        @if($company->re_wheelchair_status == 'times')
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
                                                </tr>
                                                <tr>
                                                    {{-- stretcher  3 --}}
                                                    <td>ストレッチャー</td>
                                                    <td style="width: 300px">
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="stretcher_status" id="inlineRadio1" value="circle"
                                                        @if($company->stretcher_status == 'circle')
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
                                                        <input class="form-check-input" type="radio" name="stretcher_status" id="inlineRadio2" value="triangle"
                                                        @if($company->stretcher_status == 'triangle')
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
                                                        <input class="form-check-input" type="radio" name="stretcher_status" id="inlineRadio3" value="times"
                                                        @if($company->stretcher_status == 'times')
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
                                                </tr>
                                                <tr>
                                                    {{-- slope 4 --}}
                                                    <td>スロープ</td>
                                                    <td style="width: 300px">
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="slope_status" id="inlineRadio1" value="circle"
                                                        @if($company->slope_status == 'circle')
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
                                                        <input class="form-check-input" type="radio" name="slope_status" id="inlineRadio2" value="triangle"
                                                        @if($company->slope_status == 'triangle')
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
                                                        <input class="form-check-input" type="radio" name="slope_status" id="inlineRadio3" value="times"
                                                        @if($company->slope_status == 'times')
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
                                                </tr>
                                                 <tr>
                                                    {{-- oximeter 5 --}}
                                                    <td>オキシメーター</td>
                                                    <td style="width: 300px">
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="oximeter_status" id="inlineRadio1" value="circle"
                                                        @if($company->oximeter_status == 'circle')
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
                                                        <input class="form-check-input" type="radio" name="oximeter_status" id="inlineRadio2" value="triangle"
                                                        @if($company->oximeter_status == 'triangle')
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
                                                        <input class="form-check-input" type="radio" name="oximeter_status" id="inlineRadio3" value="times"
                                                        @if($company->oximeter_status == 'times')
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
                                                </tr>
                                                <tr>
                                                    {{-- sputum 6 --}}
                                                    <td>吸痰器</td>
                                                    <td style="width: 300px">
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="sputum_status" id="inlineRadio1" value="circle"
                                                        @if($company->sputum_status == 'circle')
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
                                                        <input class="form-check-input" type="radio" name="sputum_status" id="inlineRadio2" value="triangle"
                                                        @if($company->sputum_status == 'triangle')
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
                                                        <input class="form-check-input" type="radio" name="sputum_status" id="inlineRadio3" value="times"
                                                        @if($company->sputum_status == 'times')
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
                                                </tr>
                                                <tr>
                                                    {{-- 7  --}}
                                                    <td>酸素</td>
                                                    <td style="width: 300px">
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="oxygen_status" id="inlineRadio1" value="circle"
                                                        @if($company->oxygen_status == 'circle')
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
                                                        <input class="form-check-input" type="radio" name="oxygen_status" id="inlineRadio2" value="triangle"
                                                        @if($company->oxygen_status == 'triangle')
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
                                                        <input class="form-check-input" type="radio" name="oxygen_status" id="inlineRadio3" value="times"
                                                        @if($company->oxygen_status == 'times')
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
                                                </tr>

                                                 <tr>
                                                    {{-- 8 --}}
                                                    <td>人工呼吸器</td>
                                                    <td style="width: 300px">
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="ventilator_status" id="inlineRadio1" value="circle"
                                                        @if($company->ventilator_status == 'circle')
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
                                                        <input class="form-check-input" type="radio" name="ventilator_status" id="inlineRadio2" value="triangle"
                                                        @if($company->ventilator_status == 'triangle')
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
                                                        <input class="form-check-input" type="radio" name="ventilator_status" id="inlineRadio3" value="times"
                                                        @if($company->ventilator_status == 'times')
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
                                                </tr>
                                                <tr>
                                                    {{-- basic_care 9 --}}
                                                    <td>基本介助</td>
                                                    <td style="width: 300px">
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="basic_care_status" id="inlineRadio1" value="circle"
                                                        @if($company->basic_care_status == 'circle')
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
                                                        <input class="form-check-input" type="radio" name="basic_care_status" id="inlineRadio2" value="triangle"
                                                        @if($company->basic_care_status == 'triangle')
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
                                                        <input class="form-check-input" type="radio" name="basic_care_status" id="inlineRadio3" value="times"
                                                        @if($company->basic_care_status == 'times')
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
                                                </tr>

                                                <tr>
                                                    {{-- attendant  10--}}
                                                    <td>付添介助</td>
                                                    <td style="width: 300px">
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="attendant_status" id="inlineRadio1" value="circle"
                                                        @if($company->attendant_status == 'circle')
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
                                                        <input class="form-check-input" type="radio" name="attendant_status" id="inlineRadio2" value="triangle"
                                                        @if($company->attendant_status == 'triangle')
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
                                                        <input class="form-check-input" type="radio" name="attendant_status" id="inlineRadio3" value="times"
                                                        @if($company->attendant_status == 'times')
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
                                                </tr>

                                                <tr>
                                                    {{-- 11 --}}
                                                    <td>介助補助員</td>
                                                    <td style="width: 300px">
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="helper_status" id="inlineRadio1" value="circle"
                                                        @if($company->helper_status== 'circle')
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
                                                        <input class="form-check-input" type="radio" name="helper_status" id="inlineRadio2" value="triangle"
                                                        @if($company->helper_status == 'triangle')
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
                                                        <input class="form-check-input" type="radio" name="helper_status" id="inlineRadio3" value="times"
                                                        @if($company->helper_status == 'times')
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
                                                </tr>

                                                <tr> 
                                                    {{-- 12  --}}
                                                    <td style="width: 100px">看護</td>
                                                    <td style="width: 300px">
                                                        <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="nursing_status" id="inlineRadio1" value="circle"
                                                        @if($company->nursing_status == 'circle')
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
                                                        <input class="form-check-input" type="radio" name="nursing_status" id="inlineRadio2" value="triangle"
                                                        @if($company->nursing_status == 'triangle')
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
                                                        <input class="form-check-input" type="radio" name="nursing_status" id="inlineRadio3" value="times"
                                                        @if($company->nursing_status == 'times')
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
                                                </tr>
                                            </table>
                                        </td>
                                    


                                </tr>
                                {{-- </form> --}}
                                <tr>
                                    <td>画像</td>
                                    <td>

                                        {{-- <form action="{{ route('multiple.image.store') }}" method="POST" enctype="multipart/form-data"> --}}
                                        {{-- @csrf
                                        <input type="hidden" name="id" value="{{$company->id}}" /> --}}
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6">
                                                <input type="file" name="file[]" accept="image/*" multiple="multiple" class="form-control" >
                                            </div>
                                
                                           {{--  <div class="col-md-3 col-sm-6">
                                                <button type="submit" class="btn btn-success">アップロード</button>
                                            </div> --}}
                                        </div>
                                        
                                    </form>
                                    <div class="row mt-3 p-5">
                                            @if ($company_images)
                                                @foreach($company_images as $value)
                                                <div class="col-md-3 col-sm-4 p-1 m-2">
                                                    <form action="/care-taxi/removeImage/{{$value->id}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                    <img src="{{ asset('images/'.$value->url) }}" width="100" height="100">
                                                    <button type="submit" class="btn btn-danger btn-sm mt-1"><i class="fas fa-trash-alt">消去</i></button>
                                                    </form>
                                                </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                                
                            </tbody>
        </table>
    
         <input type="submit" class="btn btn-primary float-right" value="更新" />
     </div>
 
 
 @endsection