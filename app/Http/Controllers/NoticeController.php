<?php

namespace App\Http\Controllers;

use App\Models\notice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NoticeController extends Controller
{

    public function create()
    {
        return view('notice.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photopath' => 'nullable|image',  // validating 'photopath' as nullable
        ]);

        // storing picture if provided
        if ($request->hasFile('photopath')) {
            $photo = $request->file('photopath');
            $photoname = time() . '.' . $photo->extension();
            $photo->move(public_path('images/notices/'), $photoname);
            $data['photopath'] = $photoname;
        }

        notice::create($data);
        return redirect(route('notice.index'))->with('success', 'Notice Created Successfully');
    }


    public function index()
    {
        $notices = notice::all();
        return view('notice.index', compact('notices'));
    }

    public function edit($id)
    {
        $notice = notice::find($id);
        return view('notice.edit', compact('notice'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'photopath' => 'nullable|image',
        ]);

        $notice = notice::find($id);

        if ($request->hasFile('photopath')) {
            $photo = $request->file('photopath');
            $photoname = time() . '.' . $photo->extension();
            $photo->move(public_path('images/notices/'), $photoname);
            $data['photopath'] = $photoname;

            //delete old photo
            $oldphoto = public_path('images/notices/' . $notice->photopath);
            if (file_exists($oldphoto)) {
                unlink($oldphoto);
            }
            $data['photopath'] = $photoname;
        }

        $notice->update($data);
        return redirect(route('notice.index'))->with('success', 'Notice Updated Sucessfully');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $notice = notice::find($id);
        $photo = public_path('images/notices/' . $notice->photopath);
        if (file_exists(($photo))) {
            unlink($photo);
        }


        $notice->delete();
        return redirect()->route('notice.index')->with('success', 'Notice Deleted Sucessfully');
    }

    public function sendnotice(Request $request, $id)
    {
        // Retrieve the specific notice by ID
        $notice = Notice::find($id);

        // Retrieve users with the role 'user'
        $users = User::where('role', 'user')->get(); // Adjust 'role' based on your actual role field

        // Prepare the data for the email
        $data = [
            'title' => $notice->title,
            'description' => $notice->description,
            'photopath' => url('images/notices/' . $notice->photopath), // Ensure full URL is sent
        ];

        // Send email to each user with the role 'user'
        foreach ($users as $user) {
            Mail::send('mail.notice', $data, function ($message) use ($user) {
                $message->to($user->email, $user->name) // Use the user's email and name
                    ->subject('New Notice');
            });
        }

        return redirect()->back()->with('success', 'Notice sent successfully!');
    }
}
