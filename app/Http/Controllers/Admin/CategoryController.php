<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('id','desc')->paginate(12);

        return view('admin.category.index',['categories' => $categories]);
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryStoreRequest $request)
    {
        // store image
        $images = $request->file('image')->store('public/category');
        $category = Category::create([
            'name' => $request->name,
            'slug' =>$request->slug,
            'status' => $request->status,
            'popular' => $request->popular,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'meta_keyword' => $request->meta_keyword,
            'image' =>$images
        ]);
        if($category){
            return redirect('categories')->with('status','Category Created Successfully');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit',['category'=>$category]);
    }

    public function update(Request $request, Category $category)
    {
        //delete file category
        $images = $category->image;
        if($request->hasFile('image')){
            Storage::delete($category->image);
            // add new file
            $images = $request->file('image')->store('public/category');
        }
        $category->update([
            'name' => $request->name,
            'slug' =>$request->slug,
            'status' => $request->status,
            'popular' => $request->popular,
            'description' => $request->description,
            'meta_title' => $request->meta_title,
            'meta_desc' => $request->meta_desc,
            'meta_keyword' => $request->meta_keyword,
            'image' =>$images
        ]);
        return redirect('categories')->with('status','Category Updated Successfully');
    }

    public function destroy(Category $category)
    {
        //delete category file
        Storage::delete($category->image);
        $category->delete();
        return redirect('categories')->with('status','Category Deleted Successfully');
    }
}
