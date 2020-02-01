<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\OrderProduct;
use App\Order;

use Cart;
use Log;

use Mail;
use App\Mail\OrderPlaced;



class CheckoutController extends Controller
{

    protected function decreaseQuantities()
    {
        foreach (Cart::getContent() as $item) {
            $product = Product::find($item->id);

            Product::where('id', $item->id)->update(['quantity' => $product->quantity - $item->quantity]);
        }
    }

    public function storeOrder(Request $request)
    {
    	try {
         // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'billing_name' => $request->billing_name,
            'billing_address' => $request->billing_address,
            'billing_city' => $request->billing_city,
            'billing_phone' => $request->billing_phone,
            'shipping_name' => $request->shipping_name,
            'shipping_address' => $request->shipping_address,
            'shipping_city' => $request->shipping_city,
            'shipping_message' => $request->shipping_message,
            'subtotal' => Cart::getTotal(),
            'total' => Cart::getTotal(),
        ]);
        
        // decrease the quantities of all the products in the cart

        $this->decreaseQuantities();

        // Insert into order_product table
        foreach (Cart::getContent() as $item) {
            OrderProduct::insert([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->quantity,
            ]);

        Cart::remove($item->id);
        }

        $items = OrderProduct::where('order_id', $order->id);
        // Log::info('success');
        Mail::send(new OrderPlaced($order, $items));


        return redirect()->route('view.invoice', $order->id);

        } catch (Exception $e) {
            Log::alert($e);
            return redirect()->back()->withErrors('Something Went Wrong ! Please try  again.')->withInput();         
        }
    }

    public function showInvoice($id)
    {
        $order = Order::findOrFail($id);
        $items = OrderProduct::where('order_id', $order->id)->get();

        return view('public.pages.invoice', compact('order', 'items'));
    }
}
