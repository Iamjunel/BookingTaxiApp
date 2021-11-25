@extends('layout.taxi_layout')
   @section('content')
     <div class="col-md-3 m-3">
     <a href="care-taxi/booking" class="p-3 btn btn-lg btn-outline  text-dark btn-block border-dark">利用可能なスロット/登録</a>
     <a href="care-taxi/company/edit/{{$id}}" class=" p-3 btn btn-lg btn-outline text-dark  btn-block border-dark">会社情報/編集</a>
 </div>
 
 @endsection