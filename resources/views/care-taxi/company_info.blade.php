 @extends('layout.taxi_layout')
 @section('content')
 
     <div class="col-md-8 col-sm-12 clearfix p-5">
         <h3 class="float-left"><a href="/care-taxi" class="text-dark pr-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
  <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
</svg></a>{{$company->name}}</h3>
    <form action="/care-taxi/company/update"  method="POST" >
        @csrf
        
        <input type="submit" class="btn btn-primary float-right" value="アップデート" />
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
                                    <td>電子メールアドレス</td>
                                        <td><input type="text" name="email" value="{{$company->email}}" /></td>

                                </tr>
                                <tr>
                                    <td>電話番号</td>
                                        <td><input type="text" name="phone" value="{{$company->phone}}"/></td>

                                </tr>
                                <tr>
                                    <td>キャブ名</td>
                                        <td><input type="text" name="name" value="{{$company->name}}"/></td>

                                </tr>
                                <tr>
                                    <td>休日</td>
                                        <td>
                                            {{-- <input type='date' class="date" name="holidays"/> --}}
                                           {{--  <input type="text" class="form-control date"/> --}}
                                           <input type="date" id="field-test2" name="holidays" value="{{$company->holidays}}"> 
                                            {{-- <div id="field-test"></div> --}}
                                        </td>

                                </tr>
                                <tr>
                                    <td>ページ</td>
                                        <td><input type="text" name="hp" value="{{$company->hp}}" /></td>

                                </tr>
                                <tr>
                                        <td className="align-middle">営業時間</td>
                                        <td className="p-1 m-0 pb-2" style="width: 400px">
                                            <table>
                                                <tr>
                                                    <td style="width: 100px">月曜日</td>
                                                    <td><input type="time" name="mon_start" value="{{$bh->monday_start}}" /></td> 
                                                    <td>~</td> 
                                                    <td><input type="time" name="mon_end" value="{{$bh->monday_end}}"  /></td>
                                                </tr>
                                                <tr>
                                                    <td>火曜日</td>
                                                    <td><input type="time" name="tue_start" value="{{$bh->tuesday_start}}"  /></td> 
                                                    <td>~</td> 
                                                    <td><input type="time"  name="tue_end" value="{{$bh->tuesday_end}}" /></td>
                                                </tr>
                                                <tr>
                                                    <td>水曜日</td>
                                                    <td><input type="time" name="wed_start" value="{{$bh->wednesday_start}}"  /></td>
                                                    <td>~</td> 
                                                    <td><input type="time" name="wed_end"  value="{{$bh->wednesday_end}}" /></td>
                                                </tr>
                                                <tr>
                                                    <td>木曜</td>
                                                    <td><input type="time" name="thu_start" value="{{$bh->thursday_start}}"  /></td>
                                                    <td>~</td> 
                                                    <td><input type="time" name="thu_end"  value="{{$bh->thursday_end}}"/></td>
                                                </tr>
                                                <tr>
                                                    <td>金曜日</td>
                                                    <td><input type="time" name="fri_start"  value="{{$bh->friday_start}}" /></td>
                                                    <td>~</td> 
                                                    <td><input type="time" name="fri_end" value="{{$bh->friday_end}}" /></td>
                                                </tr>
                                                <tr>
                                                    <td>土曜日</td>
                                                    <td><input type="time" name="sat_start" value="{{$bh->saturday_start}}" /></td>
                                                    <td>~</td> 
                                                    <td><input type="time" name="sat_end" value="{{$bh->saturday_end}}"   /></td>
                                                </tr>
                                                <tr>
                                                    <td>日曜日</td>
                                                    <td><input type="time" name="sun_start"  value="{{$bh->sunday_start}}" /></td>
                                                    <td>~</td> 
                                                    <td><input type="time" name="sun_end"   value="{{$bh->sunday_end}}" /></td>
                                                </tr>
                                            </table>
                                        </td>
                                    


                                </tr>

                                
                            </tbody>
        </table>
    </form>
     </div>
 
 
 @endsection