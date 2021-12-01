@extends('layout.admin_layout')
 @section('content')
     <div className="col-md-12 col-sm-12 clearfix">
                        <div >    
                    <a href="/admin" class="text-dark mr-2"><i class="fas fa-3x fa-caret-left text-secondary"></i></a>
                    <h3 class="d-inline">会社を登録する</h3>
                    </div>
                        <form action="/admin" method="POST">
                            @csrf
                            <div class="mb-2">
                                <label class="form-label">会社名:</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="" required/>
                            </div>
                            <div class="mb-2">
                                <label class="form-label">ID:</label>
                                <input type="type" name="cid" class="form-control" id="exampleInputEmail2" value="" required/>
                            </div>
                            <div className="mb-2">
                                <label class="form-label">パスワード:</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="" required/>
                            </div>
                            <div class="mb-2 mt-2">
                                <input type="submit" class="btn btn-block btn-secondary text-center" value="登録" />
                            </div>
                            
                        </form>
                    </div>
 
 @endsection