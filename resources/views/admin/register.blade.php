@extends('layout.admin_layout')
 @section('content')
     <div className="col-md-12 col-sm-12 clearfix">
                        <h2><a href='/admin' class="text-dark mr-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
  <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
</svg></a>会社を登録する</h2>
                        <form action="/admin" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label">会社名:</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" value=""/>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">ID:</label>
                                <input type="type" name="cid" class="form-control" id="exampleInputEmail2" value=""/>
                            </div>
                            <div className="mb-2">
                                <label class="form-label">パスワード:</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" value=""/>
                            </div>
                            <div class="mb-2 mt-2">
                                <input type="submit" class="btn btn-block btn-secondary text-center" value="登録" />
                            </div>
                            
                        </form>
                    </div>
 
 @endsection