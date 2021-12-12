<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Admin Dashboard
     * @author <anand parikh>
     */
    public function dashboard()
    {
        $product = Product::get();
        $productCount = $product->count();
        $order = Order::get();
        $orderCount = $order->count();
        $topproducts = Order::with('product')
        ->select(DB::raw('COUNT(product_id) as cnt'),'product_id')
        ->groupBy('product_id')
        ->orderBy('product_id', 'DESC')
        ->limit(10)
        ->get();
        $topproductCount = $topproducts->count();
        return view('admin.dashboard', compact('productCount','orderCount','topproductCount'));
    }

    /**
     * Order List
     * @author <anand parikh>
     */
    public function orderList()
    {
        $orders = Order::with('user','product')->simplePaginate(10);  
        return view('order.list', compact('orders'));                     
    }

    /**
     * Top Selling Product
     * @author <anand parikh>
     */
    public function sellingProduct()
    {
        $products = Order::with('product')
        ->select(DB::raw('COUNT(product_id) as cnt'),'product_id')
        ->groupBy('product_id')
        ->orderBy('product_id', 'DESC')
        ->limit(10)
        ->get();
       
        return view('order.topproduct', compact('products'));
    }
}
