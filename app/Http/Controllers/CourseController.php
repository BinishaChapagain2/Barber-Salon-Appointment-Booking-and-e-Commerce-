<?php

namespace App\Http\Controllers;

use App\Models\course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = course::all();
        return view('course.index', compact('courses'));
    }
    public function create()
    {

        return view('course.create');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric|lt:price',
            'photopath' => 'required|image',

        ]);



        // storing picture

        $photo = $request->file('photopath');
        $photoname = time() . '.' . $photo->extension();
        $photo->move(public_path('images/courses/'), $photoname);
        $data['photopath'] = $photoname;



        course::create($data);
        return redirect(route('course.index'))->with('success', 'Course Created Sucessfully');
    }
    public function edit($id)
    {
        $course = course::find($id);
        return view('course.edit', compact('course'));
    }
    public function update(Request $request, $id)
    {


        $data = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'price' => 'required|numeric',
            'discounted_price' => 'nullable|numeric|lt:price',
            'photopath' => 'nullable|image',

        ]);

        $course = course::find($id);

        if ($request->hasFile('photopath')) {
            // storing picture

            $photo = $request->file('photopath');
            $photoname = time() . '.' . $photo->extension();
            $photo->move(public_path('images/courses/'), $photoname);
            $data['photopath'] = $photoname;

            //delete old photo
            $oldphoto = public_path('images/courses/' . $course->photopath);
            if (file_exists($oldphoto)) {
                unlink($oldphoto);
            }
            $data['photopath'] = $photoname;
        }
        $course->update($data);
        return redirect()->route('course.index')->with('success', 'Course Updated Succcessfully');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $course = course::find($id);
        $photo = public_path('images/courses/' . $course->photopath);
        if (file_exists(($photo))) {
            unlink($photo);
        }


        $course->delete();
        return redirect()->route('course.index')->with('success', 'Course Deleted Sucessfully');
    }
}
