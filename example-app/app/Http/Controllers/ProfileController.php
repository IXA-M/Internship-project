<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view("profile", compact("user"));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'profile_picture' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg,gif,webp', 'max:2048'],
        ]);

        $file = $request->file('profile_picture');

        if (! $file || ! $file->isValid()) {
            return back()
                ->withErrors(['profile_picture' => 'Please select a valid image.'])
                ->withInput();
        }

        $oldProfilePicture = $user->profile_picture;
        $filename = Str::uuid().'.'.($file->extension() ?: 'jpg');
        $path = 'profile-pictures/'.$filename;
        $temporaryPath = $file->getPathname();

        if (! $temporaryPath || ! is_file($temporaryPath)) {
            return back()
                ->withErrors(['profile_picture' => 'The uploaded image is no longer available. Please choose it again.'])
                ->withInput();
        }

        $contents = file_get_contents($temporaryPath);

        if ($contents === false || ! Storage::disk('public')->put($path, $contents)) {
            return back()
                ->withErrors(['profile_picture' => 'The profile picture could not be saved.'])
                ->withInput();
        }

        $user->profile_picture = $path;

        if ($oldProfilePicture) {
            Storage::disk('public')->delete($oldProfilePicture);
        }

        // Save path to database
        $user->save();

        return redirect('/profile');
    }
}