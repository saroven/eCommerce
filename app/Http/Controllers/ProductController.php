<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Brand;
use App\Product;
use Log;

use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except('show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $products = Product::paginate(8);
        return view('admin.product.view', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Categories::pluck('title', 'id');
        $brand = Brand::pluck('title', 'id');

        return view('admin.product.add', compact('category', 'brand'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string|max:300',
            'description'=>'required|string',
            'category_id'=>'required|integer|exists:categories,id',
            'brand_id'=>'required|integer|exists:brand,id',
            'quantity'=>'required|integer',
            'unit_price'=>'required|integer',
            'sell_price'=>'required|integer',
            'pack_size'=>'required|integer',
            'brand_id'=>'required|integer',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

       try {

        $filename = time().'-'.rand('1234567',8).'.'.request()->image->getClientOriginalExtension();
        $request->image->move(public_path('img/thumbnail'), $filename);
        $data = array(
            'name'=>$request->name,
            'description'=> $request->description,
            'category_id'=> $request->category_id,
            'brand_id'=> $request->brand_id,
            'quantity'=> $request->quantity,
            'unit_price'=> $request->unit_price,
            'sell_price'=> $request->sell_price,
            'pack_size'=> $request->pack_size,
            'brand_id'=> $request->brand_id,
            'thumbnail' => $filename
        );
        Product::insert($data);
        return redirect()->route('product.index')->withsuccess('Product Added Successfull');

       } catch (Exception $e) {
           Log::error($e);
           return redirect()->back()->withErrors('Somethings Went Wrong! Please Try Again.')->withInput();

       }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('public.pages.single', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $category = Categories::pluck('title', 'id');
        $brand = Brand::pluck('title', 'id');

        return view('admin.product.edit', compact('product','category', 'brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'=>'required|string|max:300',
            'description'=>'required|string',
            'category_id'=>'required|integer|exists:categories,id',
            'brand_id'=>'required|integer|exists:brand,id',
            'quantity'=>'required|integer',
            'unit_price'=>'required|integer',
            'sell_price'=>'required|integer',
            'pack_size'=>'required|integer',
            'brand_id'=>'required|integer',
            'image' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

       try {
            $product = Product::findOrFail($id);

        if (request()->hasFile('image')) {


        $image_path = $product->thumbnail;

        if(file_exists($image_path)) {
            @unlink($image_path);
        }
        $file = $request->image;

        $filename = time().'-'.rand('1234567',8).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('img/thumbnail'), $filename);
        }else{
            $filename = $product->thumbnail;
        }
        
        
        $data = array(
            'name'=>$request->name,
            'description'=> $request->description,
            'category_id'=> $request->category_id,
            'brand_id'=> $request->brand_id,
            'quantity'=> $request->quantity,
            'unit_price'=> $request->unit_price,
            'sell_price'=> $request->sell_price,
            'pack_size'=> $request->pack_size,
            'brand_id'=> $request->brand_id,
            'thumbnail' => $filename
        );

        Product::where('id', $id)->update($data);

        return redirect()->route('product.index')->withsuccess('Product Updated Successfull');

       } catch (Exception $e) {
           Log::error($e);
           return redirect()->back()->withErrors('Somethings Went Wrong! Please Try Again.')->withInput();

       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id);
        try {
            Product::where('id', $id)->delete();
            return redirect()->back()->withsuccess('Deleted Successfull');
        } catch (Exception $e) {
            Log::error($e);
            return redirect()->back()->withErrors('SomeThing Went Wrong');
        }
    }
}
