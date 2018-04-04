<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    //
	protected $guarded=[];
	
	public function disliked()
	{
		return $this->morphTo();
	}
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
