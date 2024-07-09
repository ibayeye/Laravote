<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = User::find(1); // Mengambil pengguna pertama sebagai contoh
        return view('pages.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'npm' => 'nullable|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = User::find(1); // Mengambil pengguna pertama sebagai contoh

        $user->name = $request->name;
        $user->npm = $request->npm;

        if ($request->hasFile('profile_image')) {
            $imageName = time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('images'), $imageName);
            $user->profile_image = $imageName;
        }

        $user->save();

        return redirect()->route('pages.profile')->with('success', 'Profile updated successfully.');
    }
}
