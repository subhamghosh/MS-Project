			<div class="well">
				<div class="comment-form">
					<form action="{{route('productcomment.store',$product->id)}}" method="post" role="form">
						{{csrf_field()}}
						<legend><strong>Questions & Comments</strong></legend>
						<div class="form-group">
							<input type="text" class="form-control" name="body" id="" placeholder="Input..">
						</div>
						<button type="submit" class="btn btn-primary"style="float:right">Comment</button>
					</form>
					<hr>
				</div>
			</div>
				
				
		<div class="comment-list">
				<h2><label>Comments</label></h2>
				@foreach($product->comments as $comment)
				<div class="comment-list well ">
					<h4>{{$comment->body}}</h4>
					<h6>{{$comment->user->name}} || {{$comment->user->email}}</h6>					
				
				
							
				{{--Edit/Delete Comment--}}
				<div class="actions">  				
				<br>
				@if(auth()->user()->id == $comment->user_id)
					<a class="btn btn-primary btn-sm" style="float:right"data-toggle="modal" href="#{{$comment->id}}">Edit Comment</a>
					<div class="modal fade" id="{{$comment->id}}">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
									</button>
									<h4 class="modal-title">Edit Comment</h4>
								</div>
								<div class="modal-body">
									<div class="comment-form">

										<form action="{{route('comment.update',$comment->id)}}" method="post" role="form">
											{{csrf_field()}}
											{{method_field('put')}}
											
											<div class="form-group">
												<input type="text" class="form-control" name="body" id=""
													   placeholder="Input..." value="{{$comment->body}}">
											</div>
											<button type="submit" class="btn btn-primary">Submit Edited Comment</button>
										</form>

									</div>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
					{{--//delete form--}}
					<form action="{{route('comment.destroy',$comment->id)}}" method="POST" class="inline-it">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<input class="btn btn-sm btn-danger" type="submit" value="Delete Comment" style="float:right">
					</form>

				</div>
				</hr>
			@endif		
<hr>			
		{{--Reply to Comment--}}		
		<div class="reply-form" style="margin-left:30px;">				
					<form action="{{route('replycomment.store',$comment->id)}}" method="post" role="form">
						{{csrf_field()}}
						<legend><strong>Reply</strong></legend>
						<div class="form-group">
							<input type="text" class="form-control" name="body" id="" placeholder="Reply to comment..">
						</div>
						<button type="submit" class="btn btn-primary" style="float:right;">Reply</button>
					</form>
		</div>
		<hr><br>
				
				@foreach($comment->comments as $reply)
					<div class="text-info reply-list" style="margin-left:70px;">
						<h4>{{$reply->body}}</h4>
						<lead><h6>{{$reply->user->name}}|| {{$reply->user->email}}</h6></lead>
					<br><br>
				@if(auth()->user()->id == $reply->user_id)
				<div class="actions">					
					<a class="btn btn-warning btn-xs" data-toggle="modal" href="#{{$reply->id}}" style="float:right">Edit</a>
					<div class="modal fade" id="{{$reply->id}}">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
									</button>
									<h4 class="modal-title">Edit Reply</h4>
								</div>
								<div class="modal-body">
									<div class="comment-form">
										<form action="{{route('comment.update',$reply->id)}}" method="post" role="form">
											{{csrf_field()}}
											{{method_field('put')}}
											
											<div class="form-group">
												<input type="text" class="form-control" name="body" id=""
													   placeholder="Input..." value="{{$reply->body}}">
											</div>
											<button type="submit" class="btn btn-primary">Edited Reply Submit</button>
										</form>

									</div>
								</div>
							</div><!-- /.modal-content -->
						</div><!-- /.modal-dialog -->
					</div><!-- /.modal -->
				</div>
				
				{{--//delete form--}}
					<form action="{{route('comment.destroy',$reply->id)}}" method="POST" class="inline-it">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<input class="btn btn-xs btn-danger" type="submit" value="Delete" style="float:right">
					</form>

				<br>
				@endif
				<legend>    </legend>
				</div>
				@endforeach
				</div>
		</div>
			@endforeach
		
				

				
