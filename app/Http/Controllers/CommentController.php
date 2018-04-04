<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CommentController extends Controller
{
	public function addProductComment(Request $request, Product $product)
	{
		$this->validate($request,[
			'body'=>'required'
		]);
		
		$comment=new Comment();
		$comment->body=$request->body;
		$comment->user_id=auth()->user()->id;
		
		$product->comments()->save($comment);
		return back()->withMessage('comment created');
		
	}
      
     public function update(Request $request, Comment $comment)
    {
        if($comment->user_id !== auth()->user()->id)
            return back()->withMessage('Unauthorised User');
        $this->validate($request,[
            'body'=>'required'
        ]);
        $comment->update($request->all());
        return back()->withMessage('updated');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
     public function destroy(Comment $comment)
    {
        if($comment->user_id !== auth()->user()->id)
            return back()->withMessage('Unauthorised User');;
        $comment->delete();
        return back()->withMessage('Comment Deleted');
    }
	
	public function addReplyComment(Request $request, Comment $comment)
    {
        $this->validate($request,[
            'body'=>'required'
        ]);
		$reply=new Comment();
		$reply->body=$request->body;
		$reply->user_id=auth()->user()->id;
		
        $comment->comments()->save($reply);
        return back()->withMessage('Reply created');
    }
	
}
