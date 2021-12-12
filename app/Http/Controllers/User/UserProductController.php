<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserProductController extends Controller
{
    public function productList()
    {
        $products = Product::simplePaginate(10);
        return view('userproduct.userproduct', compact('products'));
    }

    public function addToCart($id)
    {
        $product = Product::find($id);
        
        $cart = session()->get('product');
        
        if (!$cart) {
            $cart = [
                'id' => $product->id,
                'name' => $product->name,
                'user_id' => Auth::guard('user')->id(),
                'quantity'=> 1,
                'price' => $product->price,
            ];
            Session::put('product', $cart);
            
            return redirect()->route('product.cartlist')->with('success','Add successfully!');
        } else {        
            return redirect()->route('product.cartlist')->with('success','Already Added');
        }
    }

    public function cartList()
    {
        $cart = session()->get('product'); 
        if (!empty($cart)) {            
            $product = Product::find($cart['id']);
            return view('product.cart', compact('cart','product'));                
        } else {            
            return redirect()->route('user.product')->with('success','No item found');
        }                
    }

    public function addOrder()
    {
        $cart = session()->get('product');
        $orderData['user_id'] = $cart['user_id'];
        $orderData['product_id'] = $cart['id'];
        $orderData['quantity'] = $cart['quantity'];        
        Order::create($orderData);
        Session::forget('product'); 
        return redirect()->route('user.product')->with('success','Order successfully');
    }
}
