<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('priority')->get();
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'priority' => 'required|numeric',
            'name' => 'required|unique:categories',
            'description' => 'required',
        ]);
        Category::create($data);
        return redirect(route('category.index'))
            ->with('success', 'Category Created Sucessfully');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'priority' => 'required|numeric',
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = Category::find($id);
        $category->update($data);
        return redirect()->route('category.index')->with('success', 'Category Updated Succcessfully');
    }
    public function delete(Request $request)
    {
        // category delete garna lai id linxa
        //

        $id = $request->id;
        $category = Category::find($id);

        // category ma product xa ki xaina check garna lai
        // product count garna lai
        //

        $products = Product::where('category_id', $id)->count();

        if ($products > 0) {
            return redirect()->route('category.index')->with('error', 'Category cannot be deleted, it has products');
        }
        //   haina vaney pauxa
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category Deleted Successfully');
    }
}
