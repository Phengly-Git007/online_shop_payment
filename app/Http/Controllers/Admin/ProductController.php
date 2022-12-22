<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id','desc')->paginate(12);
        return view('admin.product.index',['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create',['categories' => $categories]);
    }

    public function store(ProductStoreRequest $request)
    {
       $images = $request->file('image')->store('public/product');
       $product = Product::create([
        'name' => $request->name,
        'slug' => $request->slug,
        'category_id' => $request->category_id,
        'description' => $request->description,
        'short_description' => $request->short_description,
        'quantity' => $request->quantity,
        'cost_of_good' => $request->cost_of_good,
        'selling_price' => $request->selling_price,
        'tax' => $request->tax,
        'status'=>$request->status,
        'trending' => $request->trending,
        'meta_title' => $request->meta_title,
        'meta_description' => $request->meta_description,
        'meta_keyword' => $request->meta_keyword,
        'image' => $images
       ]);
       if($request->has('categories')){
        $product->categories()->attach($request->categories);
       }
       if($product){
        return redirect('products')->with('message','Product Created Successfully');
       }
    }

    public function show($id)
    {
        //
    }

    public function edit( Product $product)
    {
        $categories = Category::where('status','0')->get();
        return view('admin.product.edit',[
            'categories'=>$categories,
            'product'=>$product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $images = $product->image;
        if($request->hasFile('image')){
            Storage::delete($product->image);
            $images = $request->file('image')->store('public/product');
        }
        $product->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'quantity' => $request->quantity,
            'cost_of_good' => $request->cost_of_good,
            'selling_price' => $request->selling_price,
            'tax' => $request->tax,
            'status'=>$request->status,
            'trending' => $request->trending,
            'meta_title' => $request->meta_title,
            'meta_description' => $request->meta_description,
            'meta_keyword' => $request->meta_keyword,
            'image' => $images
        ]);
        if($request->has('categories')){
            $product->categories()->sync($request->categories);
        }
        return redirect('products')->with('message','Product Updated Successfully');
    }

    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        return redirect('products')->with('message','Product Deleted Successfully');
    }
}
