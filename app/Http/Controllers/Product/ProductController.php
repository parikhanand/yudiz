<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Services\ProductService;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->productService = new ProductService;
    }

    public function index()
    {
        return view('product.addproduct');
    }

    /**
     * Add Product
     * @author <anand parikh>
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
        ]);
    
        $imageName = time().'.'.$request->image->extension();  
     
        $request->image->move(public_path('products'), $imageName);
        $data['name'] = $request->name;
        $data['quantity'] = $request->quantity;
        $data['price'] = $request->price;
        $data['status'] = $request->status;
        $data['image'] = $imageName;
        $this->productService->create($data);        
        return redirect()->route('product.list')->with('success','Product Add successfully');
    }

    /**
     * List Product
     * @author <anand parikh>
     */
    public function list()
    {
        $products = Product::simplePaginate(10);
        return view('product.listproduct', compact('products'));
    }

    /**
     * edit product
     * @author <anand parikh>
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.editproduct',compact('product'));
    }

    /**
     * Update Product
     * @author <anand parikh>
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
        ]);
        $product = Product::find($id);

        if($request->image) {
            $path = public_path()."/products/".$product->image;
            @unlink($path);
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('products'), $imageName);
            $product->image = $imageName;
        }
        $product->name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->status = $request->status;
        $product->save();
        return redirect()->route('product.list')->with('success','Product Update Successfully');
    }

    /**
     * Delete Product
     * @author <anand parikh>
     */
    public function delete($id)
    {
        $product = Product::find($id);        
        $path = public_path()."/products/".$product->image;
        @unlink($path);
        $product->delete();
        return redirect()->route('product.list');
    }
}
