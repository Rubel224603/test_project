<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends Controller
{
    //
    public function create()
    {
        return view('admin.product.create');
    }
    public function storeProduct(Request $request)
    {
        //return $request;
        $request->validate([
            'title'       => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'qty'         => 'required|integer|min:0',
            'unit'        => 'required|string',
            'description' => 'required|string',
            'image'       => 'required|image',
        ]);

        $product         = new Product();
        $product->title  = $request->title;
        $product->price  = $request->price;
        $product->qty    = $request->qty;
        $product->unit   = $request->unit;
        $product->description = $request->description;

        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = time() . '-proudct-.' . $image->getClientOriginalExtension();
            $image->move('admin/product/', $imageName);
            //$image->url = url('admin/product/'.$imageName);
            $product->image  = $imageName;
        }
        $product->save();
        toastr()->success('Product added successfully.');
        return back()->with('message', "Product Added Successfully");
    }
    public function listProduct()
    {
        $products = Product::latest()->get();
        return view('admin.product.list', compact('products'));
    }
    public function edit($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product.list')->with('error', 'Product not found.');
        }
        return view('admin.product.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        //return $request;
        $request->validate([
            'title'       => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'qty'         => 'required|integer|min:0',
            'unit'        => 'required|string',
            'description' => 'required|string',
            'image'       => 'nullable|image',
        ]);

        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('admin.product.list')->with('error', 'Product not found.');
        }
        $product->title  = $request->title;
        $product->price  = $request->price;
        $product->qty    = $request->qty;
        $product->unit   = $request->unit;
        $product->description = $request->description;

        if ($request->file('image')) {
            //delete old image first...
            if ($product->image && file_exists('admin/product/' . $product->image)) {
                unlink('admin/product/' . $product->image);
            }
            //upload new image...
            $image = $request->file('image');
            $imageName  = time() . '-product-.' . $image->getClientOriginalExtension();
            $image->move('admin/product/', $imageName);
            //$imageUrl = url('admin/product/'.$imageName);
            $product->image = $imageName;
        }


        $product->save();
        return redirect()->route('admin.product.list')->with('message', 'Product updated Successfully');
    }
    public function delete($id)
    {
        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('admin.product.list')->with('error', "Prouduct Not Found");
        }
         if(file_exists('admin/product/'.$product->image)){
            unlink('admin/product/'.$product->image);
        }
        $product->delete();
        // return redirect()->route('admin.product.list')->with('success', 'Product deleted successfully.');

        toastr()->success('Product deleted successfully.');
        return back();
    }
}
