<?php
namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Comment;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
	   	
	function __construct()
  {
     $this->middleware('auth')->except('product.index');
  }


	
    public function index()
    {
        //$products=Product::all();
       // return view('admin.product.index',compact('products'));
	    $products=Product::orderBy('updated_at','desc')->paginate(12);
		return view('product.index', compact('products'));
		
    }
	
	

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$categories=Category::pluck('name','id');
        return view('product.create',compact('categories'));
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
		$formInput=$request->except('image');
		
		//        validation
        $this->validate($request,[
            'name'=>'required|string|max:20',
            'price'=>'required',
			'mobile'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000',
			'email'=>'required'
        ]);
		
		
		//image upload
		$image=$request->image;
        if($image){
            $imageName=$image->getClientOriginalName();
            $image->move('images',$imageName);
            $formInput['image']=$imageName;
        }
		auth()->user()->products()->create($formInput);	
		return back()->withMessage('Advert Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.single', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		
     $product = Product::find($id);
	 $categories=Category::pluck('name','id');
        // return the view and pass in the var we previously created
        //return view('admin.product.edit')->withPost($product);
		return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
		$product = Product::findOrFail($id);
		
        /*$input = Request::all();
        $product->update($input);
		*/
        if(auth()->user()->id !== $product->user_id){
        abort(401,'Unauthorised');
      }
	  $formInput=$request->except('image');
		
		//        validation
        $this->validate($request,[
            'name'=>'required|string|max:20',
            'price'=>'required',
			'mobile'=>'required',
           // 'image'=>'image|mimes:png,jpg,jpeg,PNG,JPG,JPEG|max:10000',
			'email'=>'required'
        ]);
		
		// store
            $product = Product::find($id);
            $product->name        = Input::get('name');
			$product->description = Input::get('description');
			$product->price       = Input::get('price');
			$product->mobile      = Input::get('mobile');
			$product->image       = Input::get('image');
            $product->email       = Input::get('email');
			$product->email       = Input::get('category_id');
            
            $product->save();
        //image upload
		$image=$request->image;
		//auth()->user()->products()->edit($formInput);	
		//return back()->withMessage('Advert Edited!');
		//return view('admin.product.single', compact('product'))->withMessage('Advert Edited!');
		return redirect()->route('product.index')->withMessage('Advert Edited');
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		

        product::destroy($id);
		//return redirect('home')->withMessage('Thread Updated');
		return redirect()->route('product.index')->withMessage('Advert deleted');
    }
}
