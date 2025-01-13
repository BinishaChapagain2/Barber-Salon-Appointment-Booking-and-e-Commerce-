<?php

namespace App\Http\Controllers;

use App\Models\service;
use App\Models\servicecategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{

    public function index()
    {
        $services = service::all();
        return view('service.index', compact('services'));
    }
    public function create()
    {


        $servicecategories = servicecategory::orderBy('priority')->get();
        return view('service.create', compact('servicecategories'));

        // helps to fetch the catefory data in the $categories variable

    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'servicecategory_id' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric|lt:price',
            'status' => 'required',
            'photopath' => 'required|image',

        ]);



        // storing picture

        $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/services/'), $photoname);
        $data['photopath'] = $photoname;



        service::create($data);
        return redirect(route('service.index'))->with('success', 'Service Created Sucessfully');
    }
    public function edit($id)
    {
        $service = service::find($id);
        $servicecategories = servicecategory::orderBy('priority')->get();
        // single data fecth so service , Multiple categories fetcg so categories
        return view('service.edit', compact('service', 'servicecategories'));
    }
    public function update(Request $request, $id)
    {


        $data = $request->validate([
            'name' => 'required',
            'servicecategory_id' => 'required|integer',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric|lt:price',
            'status' => 'required',
            'photopath' => 'nullable|image',

        ]);

        $service = service::find($id);

        if ($request->hasFile('photopath')) {
            // storing picture

            $photo = $request->file('photopath');
            $photoname = time() . '.' . $photo->extension();
            $photo->move(public_path('images/services/'), $photoname);
            $data['photopath'] = $photoname;

            //delete old photo
            $oldphoto = public_path('images/services/' . $service->photopath);
            if (file_exists($oldphoto)) {
                unlink($oldphoto);
            }
            $data['photopath'] = $photoname;
        }
        $service->update($data);
        return redirect()->route('service.index')->with('success', 'Service Updated Succcessfully');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $service = service::find($id);
        $photo = public_path('images/services/' . $service->photopath);
        if (file_exists(($photo))) {
            unlink($photo);
        }


        $service->delete();
        return redirect()->route('service.index')->with('success', 'Service Deleted Sucessfully');
    }
}
