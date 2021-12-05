 @extends('layout.user_layout')
 @section('content')
 <div class="container">
     <div class="col-md-12 col-sm-12 clearfix">
         <a href="/user/slot/detail/{{$company->id}}/{{date('Y-m-d', strtotime('last monday'))}}" class="float-right btn btn-danger">利用可能なスロット</a>
         <h3 className="float-left"><a href="/user" class="text-dark pr-1"><i class="fas fa-2x fa-caret-left text-secondary"></i></a>会社リスト</h3>
        
        <div class="row ">
            @if(empty($company_images))
            <div class="container col-md-12 col-sm-12 ">
            <img src="https://www.nuvali.ph/wp-content/themes/consultix/images/no-image-found-360x250.png" class="img-fluid" style="height:300px"/>
            </div>
            @else
            <div class="container col-md-12 col-sm-12">
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
        <div class="row">
            <div class="container col-md-12 col-sm-12">
                <table class="table table-striped table-hover table-bordered">
                <tbody>
                    <tr>
                        <td colspan="2" class="text-center">{{$company->name}}</td>
                    </tr>   

                    <tr>
                    <td>CEO名</td>
                    <td>{{$company->in_charge}}</td>
                    </tr>
                    <tr>
                    <td>住所<</td>
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
                    <td>HP</td>
                    <td>{{$company->hp}}</td>
                    </tr>
                    <tr>
                    <td colspan="2"><span class="p-5">{{$company->notes}}</span></td>
                    </tr>
                   
                </tbody>
                </table>
            </div>
        </div>
     </div>
 </div>
 
 @endsection