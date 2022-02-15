@extends('layout.admin_layout')
 @section('content')
     <div className="col-md-12 col-sm-12 clearfix">
                    <div class="d-flex">    
                    <a href="/admin" class="text-center text-dark mr-2"><i class="fas fa-3x fa-caret-left text-secondary"></i></a>
                    <h3 class=" text-center"  style="line-height:1.8">会社を登録する</h3>
                    </div>
                        <form accept-charset="U+FF66-U+FF9F" action="/admin" method="POST" >
                            @csrf
                            <div class="mb-2">
                                <label class="form-label">会社名(名称略)※全角5文字以内:</label>
                                <input type="tel" name="name" class="form-control .input"   id="exampleInputEmail1" value="" required/>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">ID:</label>
                                <input type="type" name="cid" class="form-control" id="exampleInputEmail2"  onChange="halfWidth(this)" value="" required/>
                            </div>
                            <div className="mb-2">
                                <label class="form-label">パスワード:</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" onChange="halfWidth(this)" value="" required/>
                            </div>
                            <div class="mb-2 mt-2">
                                <input type="submit" class="btn btn-block btn-secondary text-center" value="登録" />
                            </div>
                            
                        </form>
 
 @endsection