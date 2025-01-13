<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = product::all();

        return view('product.index', compact('products'));
    }
    public function create()
    {


        $categories = Category::orderBy('priority')->get();
        return view('product.create', compact('categories'));

        // helps to fetch the catefory data in the $categories variable

    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric|lt:price',
            //stock cant be negative
            'stock' => 'required|numeric|min:0',
            'status' => 'required',
            'photopath' => 'required|image',

        ]);



        // storing picture

        $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/products/'), $photoname);
        $data['photopath'] = $photoname;



        product::create($data);
        return redirect(route('product.index'))->with('success', 'Product Created Sucessfully');
    }
    public function edit($id)
    {
        $product = product::find($id);
        $categories = Category::orderBy('priority')->get();
        // single data fecth so product , Multiple categories fetcg so categories
        return view('product.edit', compact('product', 'categories'));
    }
    public function update(Request $request, $id)
    {


        $data = $request->validate([
            'name' => 'required',
            'category_id' => 'required|integer',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric|lt:price',
            'stock' => 'required|numeric',
            'status' => 'required',
            'photopath' => 'nullable|image',

        ]);

        $product = Product::find($id);

        if ($request->hasFile('photopath')) {
            // storing picture

            $photo = $request->file('photopath');
            $photoname = time() . '.' . $photo->extension();
            $photo->move(public_path('images/products/'), $photoname);
            $data['photopath'] = $photoname;

            //delete old photo
            $oldphoto = public_path('images/products/' . $product->photopath);
            if (file_exists($oldphoto)) {
                unlink($oldphoto);
            }
            $data['photopath'] = $photoname;
        }
        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Product Updated Succcessfully');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $product = product::find($id);
        $photo = public_path('images/products/' . $product->photopath);
        if (file_exists(($photo))) {
            unlink($photo);
        }


        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product Deleted Sucessfully');
    }
}
