<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class DislikeController extends Controller
{
    //
	public function dislikeIt()
	{
	   $productId=Input::get('productId');
       $product=Product::find($productId);
	   if(!$product->isDisliked()){
            $product->dislikeIt();
            return response()->json(['status'=>'success','message'=>'disliked']);
        }else{
            $product->undislikeIt();
            return response()->json(['status'=>'success','message'=>'undisliked']);
        }
	  
	}
}
