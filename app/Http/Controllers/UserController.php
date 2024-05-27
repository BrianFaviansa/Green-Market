<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    /**
     * Update the specified resource in storage.
     */
    public function updateAdmin(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|',
            'phone_number' => 'required|max:255',
            'home_address' => 'required|max:255',
            'oldPassword' => 'nullable|min:3',
            'newPassword' => 'nullable|min:3',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,svg',
        ]);

        if ($validatedData['oldPassword'] && $validatedData['newPassword']) {
            if (!Hash::check($request->oldPassword, $user->password)) {
                return back()->with('error_message', 'Old password wrong.');
            }
            $validatedData['password'] = Hash::make($request->newPassword);
        }

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = $request->input('phoyo') . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('photos', $imageName, 'public');
            $validatedData['photo'] = $imageName;
            Storage::disk('public')->delete('photos/' . $user->photo);
            $user->photo = $imageName;
        } else {
            $validatedData['photo'] = $user->photo;
        }

        $user->update($validatedData);

        if ($user->update($validatedData)) {
            return redirect()->route('admin.profile.edit', $user)->with('success_message', 'User updated successfully');
        }

        return redirect()->route('admin.profile.edit', $user)->with('error_message', 'User update failed');
    }

    public function updateUser(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|',
            'phone_number' => 'required|max:255',
            'home_address' => 'required|max:255',
            'oldPassword' => 'nullable|min:3',
            'newPassword' => 'nullable|min:3',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,svg',
        ]);

        if ($validatedData['oldPassword'] && $validatedData['newPassword']) {
            if (!Hash::check($request->oldPassword, $user->password)) {
                return back()->with('error_message', 'Old password wrong.');
            }
            $validatedData['password'] = Hash::make($request->newPassword);
        }

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = $request->input('phoyo') . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('photos', $imageName, 'public');
            $validatedData['photo'] = $imageName;
            Storage::disk('public')->delete('photos/' . $user->photo);
            $user->photo = $imageName;
        } else {
            $validatedData['photo'] = $user->photo;
        }

        $user->update($validatedData);

        if ($user->update($validatedData)) {
            return redirect()->route('user.profile.edit', $user)->with('success_message', 'User updated successfully');
        }

        return redirect()->route('user.profile.edit', $user)->with('error_message', 'User update failed');
    }
}
