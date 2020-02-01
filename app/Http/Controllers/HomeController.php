<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

use Cart;
use Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // if (auth()->user()->role_id == 1) {
        //     return redirect()->to('/dashboard');
        // } else {
        //     return view('home');
        // }

        $products = Product::paginate(12);
        return view('public.index', compact('products'));
        
    }
    
    public function address()
    {
        if (\Cart::getContent()->count() == 0) {
            return redirect()->to('/');
        }
        return view('public.pages.address');
        
    }

    public function checkout(Request $data)
    {

        $this->validate($data, [
            'billing_name' => 'required|string',
            'billing_address' => 'required|string',
            'billing_city' => 'required|string',
            'billing_email' => 'required|string',
            'billing_phone' => 'required|numeric',
            'shipping_name' => 'required|string',
            'shipping_address' => 'required|string',
            'shipping_city' => 'required|string',
            'shipping_message' => 'nullable|string',
        ]);
        return view('public.pages.checkout', compact('data'));
        
    }


    
}
