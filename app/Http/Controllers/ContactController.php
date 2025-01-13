<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{


    public function index()
    {
        $contacts = contact::all();
        return view('contact.index', compact('contacts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'message' => 'required',
        ]);

        contact::create($request->all());

        return back()->with('success', 'Thank you for reaching out! We will get back to you soon.');
    }
}
