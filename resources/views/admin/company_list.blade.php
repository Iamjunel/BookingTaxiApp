 @extends('layout.admin_layout')
 @section('content')
 <div class="container">
     <div class="col-md-12 col-sm-12 clearfix">
         <div >    
         <a href="/admin" class="text-dark mr-2"><i class="fas fa-3x fa-caret-left text-secondary"></i></a>
        <h3 class="d-inline">登録会社一覧</h3>
        {{-- new registration --}}
        <a href="/admin/register" class="btn btn-light text-dark border-dark float-right">新規登録</a>
         </div>
        <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
        
            <th>会社名</th>
            <th>ID</th>
            <th>パスワード</th>
            <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($company as $com)
            <tr>
            <td>{{$com->name}}</td>
            <td>{{$com->cid}}</td>
            <td>{{$com->cpass}}</td>
            <td><button class="btn btn-danger" data-toggle="modal" data-target="#sample-{{$com->id}}">削除</button></td>
            <div class="modal fade" id="sample-{{$com->id}}" tabindex="-1" role="dialog" aria- 
            labelledby="demoModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-sm" role="document">
                    <form action="company/{{$com->id}}" method="post">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="demoModalLabel">{{$com->name}}</h5>
								<button type="button" class="close" data-dismiss="modal" aria- 
                                label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
						</div>
						<div class="modal-body">
								<h4>この会社を削除してもよろしいですか？</h4>
						</div>
						<div class="modal-footer">
                            @method('DELETE')
                             @csrf
							<button type="button" class="btn btn-secondary" data-dismiss="modal">いいえ</button>
						    <button type="submit" class="btn btn-primary">はい</button>
        
						</div>
					</div>
                    </form>
				</div>
			</div>
            </tr>
            @endforeach
            
            
        </tbody>
        </table>
     </div>
 </div>
 
 @endsection
 
