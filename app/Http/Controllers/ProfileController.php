<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();



        // Fill validated data into the user
        $user->fill($request->validated());

        // Check if email is updated and set the email_verified_at field to null
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Update profile picture if a new file is uploaded
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if it exists
            $oldProfilePicture = $user->profile_picture;

            if ($oldProfilePicture && file_exists(public_path('images/profile_pictures/' . $oldProfilePicture))) {
                unlink(public_path('images/profile_pictures/' . $oldProfilePicture));  // Delete the old profile picture
            }

            // Store new profile picture and update the database
            $profilePicture = $request->file('profile_picture');
            $profilePictureName = time() . '.' . $profilePicture->getClientOriginalExtension();  // Create a unique name
            $profilePicture->move(public_path('images/profile_pictures'), $profilePictureName);  // Store the picture

            // Update the user's profile picture in the database
            $user->profile_picture = $profilePictureName;
        }

        // Update phone number and gender if they are present in the request
        if ($request->has('phone')) {
            $user->phone = $request->phone;
        }
        if ($request->has('gender')) {
            $user->gender = $request->gender;
        }

        if ($request->has('address')) {
            $user->address = $request->address;
        }



        // Save the updated user data
        $user->save();

        // Redirect with success message
        return Redirect::route('profile.edit')->with('success', 'Profile Updated Successfuly');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);

        $user = Auth::user();

        // Check if the provided password matches the user's password
        if (!Hash::check($request->password, $user->password)) {
            return back()->with(['success' => 'Password does not match our records.']);
        }

        // Delete the user account
        $user->delete();

        // Log out the user after account deletion
        Auth::logout();

        return redirect('/')->with('success', 'Your account has been deleted successfully.');
    }
}
