<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

use Cart;
use Log;

class CartController extends Controller
{
     public function cart()
    {
    
        return view('public.pages.cart');
        
    }

    public function addToCart(Request $request, $id)
    {
        // $request->session()->forget('cart');
        $product = Product::findOrFail($id);
        // $oldCart = $request->session()->has('cart') ? $request->session()->get('cart') : null;
        // $cart = new Cart($oldCart);

        // $cart->add($product, $id); 

        // $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        // for ($i=1; $i > 0; $i++) { 
            

        // }
        // return $product->thumbnail;

        
// Cart::remove($id);
        	

            Cart::add(['id'=> $product->id, 'name'=> $product->name, 'price'=> $product->sell_price, 'quantity'=> 1]);

        

        

        return redirect()->back();
    }

    public function updateQty($pid,$qty)
    {

        Cart::update($pid, array(
          'quantity' => array(
              'relative' => false,
              'value' => $qty

          ),
        ));

        return "success";
        
    }

    public function destroyCartItem($id)
    {
        try {

        	

            \Cart::remove($id);
            return redirect()->back()->withsuccess('Cart item removed suuccessfull.');

        } catch (Exception $e) {

            Log::error($e);
            return redirect()->back()->withErrors('Something Went Wrong ! Please try again.');
        }
    }

}
