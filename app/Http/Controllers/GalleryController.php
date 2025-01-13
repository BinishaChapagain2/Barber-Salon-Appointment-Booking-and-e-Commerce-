<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = gallery::all();

        return view('gallery.index', compact('galleries'));
    }
    public function create()
    {


        $galleries = gallery::all();
        return view('gallery.create', compact('galleries'));

        // helps to fetch the catefory data in the $galleries variable

    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([

            'photopath' => 'required|image',

        ]);



        // storing picture

        $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/galleries/'), $photoname);
        $data['photopath'] = $photoname;



        gallery::create($data);
        return redirect(route('gallery.index'))->with('success', 'Photo Uploaded in Gallery Sucessfully');
    }
    public function edit($id)
    {
        $gallery = gallery::find($id);

        return view('gallery.edit', compact('gallery'));
    }
    public function update(Request $request, $id)
    {


        $data = $request->validate([

            'photopath' => 'nullable|image',

        ]);

        $gallery = gallery::find($id);

        if ($request->hasFile('photopath')) {
            // storing picture

            $photo = $request->file('photopath');
            $photoname = time() . '.' . $photo->extension();
            $photo->move(public_path('images/galleries/'), $photoname);
            $data['photopath'] = $photoname;

            //delete old photo
            $oldphoto = public_path('images/galleries/' . $gallery->photopath);
            if (file_exists($oldphoto)) {
                unlink($oldphoto);
            }
            $data['photopath'] = $photoname;
        }
        $gallery->update($data);
        return redirect()->route('gallery.index')->with('success', 'Photo Updated Succcessfully in Gallery');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $gallery = gallery::find($id);
        $photo = public_path('images/galleries/' . $gallery->photopath);
        if (file_exists(($photo))) {
            unlink($photo);
        }


        $gallery->delete();
        return redirect()->route('gallery.index')->with('success', 'Photo Deleted Sucessfully from Gallery');
    }
}
