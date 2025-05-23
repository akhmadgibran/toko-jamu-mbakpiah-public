<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneController extends Controller
{
    //

    // public function update(Request $request)
    // {
    //     //
    //     $validatedData = $request->validate([
    //         'phone' => 'required',
    //     ]);

    //     $user = Auth::user();
    //     $user->phone = $validatedData['phone'];
    //     $user->save();

    //     return redirect()->route('profile.edit')->with('status', 'phone-updated');
    // }

    public function update(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'user_id' => 'required',
            'phone' => 'required',
        ]);

        // Update the user's phone number
        $user = User::findOrFail($validatedData['user_id']);
        $user->phone = $validatedData['phone'];
        $user->save();




        return back()->with('status', 'phone-updated');
        // Redirect the user to the profile edit page with a flash message
        // return redirect()->route('profile.edit')->with('status', 'phone-updated');
    }
}
