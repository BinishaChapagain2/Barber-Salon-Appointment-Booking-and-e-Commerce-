<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:15',
            'gender' => 'required|in:male,female,other',
            'address' => 'required|string|max:255',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if the profile_picture file exists in the request
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/profile_pictures'), $filename);
            $profilePicture = $filename; // Save the filename to use in the user creation
        } else {
            $profilePicture = 'defaultusericon.jpg'; // Fallback to default icon if no file is uploaded
        }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'profile_picture' => $profilePicture, // Save the profile picture filename
        ]);

        // Auto-login after registration
        Auth::login($user);

        // Redirect based on the role of the user
        if (Auth::user()->role === 'admin') {
            return redirect(route('dashboard', absolute: false));
        }
        return redirect(route('homepage', absolute: false))->with('success', 'Registration successful!');
    }
}
