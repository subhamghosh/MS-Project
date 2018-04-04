<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class LikeController extends Controller
{
    //
	public function likeIt()
	{
	   $productId=Input::get('productId');
       $product=Product::find($productId);
	   if(!$product->isLiked()){
            $product->likeIt();
            return response()->json(['status'=>'success','message'=>'liked']);
        }else{
            $product->unlikeIt();
            return response()->json(['status'=>'success','message'=>'unliked']);
        }
	  
	}
	
}
