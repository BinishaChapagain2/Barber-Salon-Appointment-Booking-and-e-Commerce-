<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => 'success',
            'message' => 'All categories fetched successfully',
            'data' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'priority' => 'required|numeric',
        ]);

        Category::create($data);

        return response()->json([
            'status' => 'success',
            'message' => 'Category created successfully',
        ]);
    }
}
