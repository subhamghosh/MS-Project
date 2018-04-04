<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Http\Request;

class Product extends Model
{
    //
	protected $fillable=['name','description','price','mobile','image','email','category_id'];
	
	public function category()
	{
		$this->belongsTo(Category::class);
	}
	protected $guarded=[];

    public function user()
    {
      return $this->belongsTo(User::class);
    }
	
	 public function comments()
    {
      return $this->morphMany(Comment::class,'commentable')->latest();
    }
	
	/*Like functions*/
	public function likeIt()
    {
        $like = new Like();
        $like->user_id = auth()->user()->id;
        $this->likes()->save($like);
        return $like;
    }
    public function likes()
    {
        return $this->morphMany(Like::class, 'likable');
    }
    public function unlikeIt()
    {
//        $like = Like::find($id);
        $this->likes()->where('user_id',auth()->id())->delete();
    }
    public function isLiked()
    {
        return !!$this->likes()->where('user_id',auth()->id())->count();
    }
	
	/*Dislike*/
	public function dislikeIt()
    {
        $dislike = new Dislike();
        $dislike->user_id = auth()->user()->id;
        $this->dislikes()->save($dislike);
        return $dislike;
    }
    public function dislikes()
    {
        return $this->morphMany(Dislike::class, 'disliked');
    }
    public function undislikeIt()
    {
//        $like = Like::find($id);
        $this->dislikes()->where('user_id',auth()->id())->delete();
    }
    public function isDisliked()
    {
        return !!$this->dislikes()->where('user_id',auth()->id())->count();
    }

}
