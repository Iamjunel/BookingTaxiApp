 @extends('layout.user_layout')
 @section('content')
 <div class="container">
     <div class="col-md-12 col-sm-12 clearfix">    
         <h3 className="float-left"><a href="/user" className="text-dark"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
  <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
</svg></a>会社リスト</h3>
        <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
        
            <th>会社名</th>
            <th>ID</th>
            <th>パスワード</th>
            <th>行動</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($company as $com)
            <tr>
            <td>{{$com->name}}</td>
            <td>{{$com->cid}}</td>
            <td>{{$com->cpass}}</td>
            <td><button class="btn btn-danger" data-toggle="modal" data-target="#sample-{{$com->id}}">消去</button></td>
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
							<button type="button" class="btn btn-secondary" data-dismiss="modal">番号</button>
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
 
