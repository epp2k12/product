<?php

namespace App\Http\Controllers;
use App\Product;
use App\Prefix;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo "<h1>HELLO THIS IS INSIDE PRODUCT INDEX</h1>";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('products.create'); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'unique:products', 'max:50'],
            'description' => ['required', 'max:255'],
        ]);
        //
        $product=new Product;
        $product->name=$request->name; 
        $product->description=$request->description;
        if($product->save()) {
            return redirect()->route('product.show',$product);
        };
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
        // return view('products.show')->with('product',$product);
        return view('products.show',['product'=>$product]);
        // dd($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        dd($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        dd($product);
    }


    /**
     * Update the User Avatar in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function upload_image(Request $request)
    {
        // return view('profile');
        // dd($request->avatar->getClientOriginalName());
        // $request->file('avatar')->store('images','public');
        // return "uploaddeeedddddd";
        //$product_image_name="product.jpeg" ;        
        if ($request->hasFile('product_image')) {

            // $product_image_name = $request->product_image->getClientOriginalName();
            // $request->product_image->storeAs('images/products/temp/', $product_image_name, 'public');
             /*
            $this->deleteOldAvatar();
            $request->avatar->storeAs('images/produccts/temp', $avatar_name, 'public');
            auth()->user()->update(array('avatar' => $avatar_name));
            */
        }
        // return redirect()->back()->with("image_name",$product_image_name);
        // $user = auth()->user();
        // dd($user);
    }

    protected function deleteOldImage()
    {
        if (auth()->user()->avatar) {
            Storage::delete('/public/images/' . auth()->user()->avatar);
        }
    }

    public function add_prefix(Product $product, Request $request) {

        $product->product_code = 'ABC' . "-" . $product->id;
        $product->save();        

    }

    public function test() {

        $prefix=new Prefix;
        $prefix->name="MyProduct"; 
        $prefix->product_code="ABC" . "-" . $prefix->id;
        $prefix->save();

        $prefix->product_code = 'ABC' . "-" . $prefix->id;
        $prefix->save();

        dd($prefix->product_code);

    }


}