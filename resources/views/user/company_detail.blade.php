 @extends('layout.user_layout')
 @section('content')
 <div class="container">
     <div class="col-md-12 col-sm-12 clearfix">
         <a href="/user/slot/detail/{{$company->id}}" class="float-right btn btn-danger">利用可能なスロット</a>
         <h3 className="float-left"><a href="/user/companylist" className="text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
  <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
</svg></a>会社リスト</h3>
        <div class="row ">
            <div class="container col-md-12 col-sm-12">
            <img src="https://pasadenanaturalhealth.com/wp-content/uploads/2017/08/placeholder-image-600x400.jpg" class="img-fluid w-100"/>
            </div>
        </div>
        <div class="row">
            <div class="container col-md-12 col-sm-12">
                <table class="table table-striped table-hover table-bordered">
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
                </table>
            </div>
        </div>
     </div>
 </div>
 
 @endsection