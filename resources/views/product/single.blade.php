@extends('layouts.app')

@section('content')


    <div class="container">
		<div class="row">		
		@include('components.sidebar')		
			<div class="col-md-8 col-md-offset-2">
		@include('components.notification')
				<div class="well">
					<div class="card">
{{-----Individual Advert Display-------}}
						<a target="_blank" href="{{url('images',$product->image)}}" >
							<img src="{{url('images',$product->image)}}"alt="{{$product->name}}"style="height: 200px;width: 50%;border-radius: 8px;border: 2px solid black;padding:5px;margin: 25px;"/>
						</a>
						<div style="border: 2px solid black;padding:5px;margin: 25px;border-radius: 8px;">						
							<h4><label>Name</label> {{$product->name}}</h4>
							<h4 style="word-wrap: break-word;"><label>Description</label> {{$product->description}}</h4>
							<h2><label>Price</label> {{$product->price}}</h2>
							<h2><label>Mobile</label> {{$product->mobile}}</h2>							
						</div>
{{-----Like Button-------}}
						<span class='btn {{$product->isLiked()?"liked":""}}' onclick="likeIt('{{$product->id}}',this)" ><span class="glyphicon glyphicon-thumbs-up"></span> </span>
						<span id="{{$product->id}}-count">{{$product->likes()->count()}}</span>
						<span class='btn  {{$product->isDisliked()?"disliked":""}}' onclick="dislikeIt('{{$product->id}}',this)" ><span class="glyphicon glyphicon-thumbs-down"></span> </span>
						<span id="{{$product->id}}-countt">{{$product->dislikes()->count()}}</span>
{{-----Mail to Seller-------}}
						<a class="btn btn-primary" role="button" href="mailto:{{$product->email}}?subject={{$product->name}}%20{{$product->price}}&body=I%20am%20interested%20in%20buying%20--->%20{{$product->description}}" target="_top">Email</a>

{{-----Advert Edit Delete-------}}
						@if(auth()->user()->id == $product->user_id)	  
							<a href="{{route('product.edit', $product->id)}}" class="btn btn-warning" role="button">Edit</a>
							<br> <br>
{{--//delete form--}}
							<form action="{{route('product.destroy',$product->id)}}" method="POST" class="inline-it">
								{{csrf_field()}}
								{{method_field('DELETE')}}
								<input class="btn  btn-danger" type="submit" value="Delete">
							</form>
						@endif
{{-----Advert Comment System-------}}
		@include('components.comment')
				
					</div>
				</div>	  
			</div>
		</div>
	</div>
@endsection
@section('js')
<script>
function likeIt(productId,elem){
	var csrfToken='{{csrf_token()}}';
	var likesCount=parseInt($('#'+productId+"-count").text());
	$.post('{{route('likeIt')}}', {productId: productId,_token:csrfToken}, function (data) {
        console.log(data);
		if(data.message==='liked'){
			$(elem).addClass('liked');
			$('#'+productId+"-count").text(likesCount+1);
			/*$(elem).css({color:'red'});
			$(elem).text('Liked');*/
		}else{
			/*$(elem).css({color:'black'});
			$(elem).text('Liked Removed');*/
			$('#'+productId+"-count").text(likesCount-1);
			$(elem).removeClass('liked');
		}
	})
}
function dislikeIt(productId,elem){
	var csrfToken='{{csrf_token()}}';
	var dislikesCount=parseInt($('#'+productId+"-countt").text());
	$.post('{{route('dislikeIt')}}', {productId: productId,_token:csrfToken}, function (data) {
        console.log(data);
		if(data.message==='disliked'){
			//$(elem).css({color:'red'});
			$(elem).addClass('disliked');
			$('#'+productId+"-countt").text(dislikesCount+1);
			//$(elem).text('Disliked');
		}else{
			//$(elem).css({color:'black'});
			$('#'+productId+"-countt").text(dislikesCount-1);
			$(elem).removeClass('disliked');
			//$(elem).text('Dislike Removed');
		}
	})
}
</script>
@endsection

<!--
<a href="/mail">send</a>
			<input type="submit" name="submit" value="Email" class="btn btn-primary">
			
<form action="mailto:{{$product->email}}">
							<input type="submit" name="submit" value="Email" class="btn btn-primary">
						</form>
<a href="/mail">send</a>
						<form action="?" method="post">
							<input type="submit" value="Submit"/>
						</form>-->						