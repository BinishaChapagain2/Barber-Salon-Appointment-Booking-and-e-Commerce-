<?php

namespace App\Http\Controllers;

use App\Models\service;
use App\Models\servicecategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $servicecategories = servicecategory::orderBy('priority')->get();
        return view('servicecategory.index', compact('servicecategories'));
    }

    public function create()
    {
        return view('servicecategory.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'priority' => 'required|numeric',
            'name' => 'required|unique:servicecategories',
            'description' => 'required',
        ]);
        servicecategory::create($data);
        return redirect(route('servicecategory.index'))
            ->with('success', 'Service Category Created Sucessfully');
    }

    public function edit($id)
    {
        $servicecategory = servicecategory::find($id);
        return view('servicecategory.edit', compact('servicecategory'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'priority' => 'required|numeric',
            'name' => 'required',
            'description' => 'required',
        ]);

        $servicecategory = servicecategory::find($id);
        $servicecategory->update($data);
        return redirect()->route('servicecategory.index')->with('success', 'Service Category Updated Succcessfully');
    }
    public function delete(Request $request)
    {
        // category delete garna lai id linxa
        //

        $id = $request->id;
        $servicecategory = servicecategory::find($id);

        // category ma product xa ki xaina check garna lai
        // product count garna lai
        //

        $services = service::where('servicecategory_id', $id)->count();

        if ($services > 0) {
            return redirect()->route('servicecategory.index')->with('error', 'Service Category cannot be deleted, it has Services');
        }
        //   haina vaney pauxa
        $servicecategory->delete();

        return redirect()->route('servicecategory.index')->with('success', 'Service Category Deleted Successfully');
    }
}
