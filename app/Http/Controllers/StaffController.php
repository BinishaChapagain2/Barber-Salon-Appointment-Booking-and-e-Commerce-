<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $staffs = staff::all();
        return view('staff.index', compact('staffs'));
    }
    public function create()
    {
        return view('staff.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'specialization' => 'nullable|string',
            'experience' => 'required|integer',
            'photopath' => 'required|image',
        ]);

        $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/staffs/'), $photoname);
        $data['photopath'] = $photoname;

        staff::create($data);
        return redirect(route('staff.index'))->with('success', 'Staff Added Sucessfully');
    }

    public function edit($id)
    {
        $staff = staff::find($id);
        // single data fetch from staff model
        return view('staff.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {

        $data = $request->validate([
            'name' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required',
            'facebook' => 'nullable|string',
            'instagram' => 'nullable|string',
            'tiktok' => 'nullable|string',
            'specialization' => 'nullable|string',
            'experience' => 'required|integer',
            'photopath' => 'nullable|image',
        ]);


        $staff = staff::find($id);

        if ($request->hasFile('photopath')) {
            // storing picture

            $photo = $request->file('photopath');
            $photoname = time() . '.' . $photo->extension();
            $photo->move(public_path('images/staffs/'), $photoname);
            $data['photopath'] = $photoname;

            //delete old photo
            $oldphoto = public_path('images/staffs/' . $staff->photopath);
            if (file_exists($oldphoto)) {
                unlink($oldphoto);
            }
            $data['photopath'] = $photoname;
        }
        $staff->update($data);
        return redirect()->route('staff.index')->with('success', 'Staff Updated Succcessfully');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $staff = staff::find($id);
        $photo = public_path('images/staffs/' . $staff->photopath);
        if (file_exists(($photo))) {
            unlink($photo);
        }
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Staff Deleted Sucessfully');
    }
}
