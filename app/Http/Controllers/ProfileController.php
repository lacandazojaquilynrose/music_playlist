<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
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
        
        // Fill validated fields (name, email)
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Check if an image file was uploaded
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            
            // Create a unique name to avoid conflicts: timestamp_filename.ext
            $filename = time() . '_' . $file->getClientOriginalName();
            
            // Move the file directly to public/uploads/profiles inside your XAMPP directory
            $file->move(public_path('uploads/profiles'), $filename);
            
            // Delete the old file from the disk if it exists
            if ($user->profile_image && file_exists(public_path('uploads/profiles/' . $user->profile_image))) {
                @unlink(public_path('uploads/profiles/' . $user->profile_image));
            }
            
            // Save the new filename to the user record
            $user->profile_image = $filename;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        // Optional cleaning: delete their profile pic if they delete their account
        if ($user->profile_image && file_exists(public_path('uploads/profiles/' . $user->profile_image))) {
            @unlink(public_path('uploads/profiles/' . $user->profile_image));
        }

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}