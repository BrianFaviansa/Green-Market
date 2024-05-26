<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|',
            'phone_number' => 'required|max:255',
            'home_address' => 'required|max:255',
            'oldPassword' => 'nullable|min:3',
            'newPassword' => 'nullable|min:3',
        ]);

        if ($validatedData['oldPassword'] && $validatedData['newPassword']) {
            if (!Hash::check($request->oldPassword, $user->password)) {
                return back()->with('error_message', 'Old password wrong.');
            }
            $validatedData['password'] = Hash::make($request->newPassword);
        }

        if ($user->update($validatedData)) {
            return redirect()->back()->with('success_message', 'User updated successfully');
        }

        return redirect()->back()->with('error_message', 'User update failed');
    }
}
