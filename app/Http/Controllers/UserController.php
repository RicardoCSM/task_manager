<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function index() {
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();
        return view('app.user.index', ['title' => 'User Profile', 'user' => $user]);
    }

    public function updateName(Request $request) {
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();

        $request->validate(['name' => 'required|string|min:3|max:40|unique:users']);

        $user->update($request->all());

        return redirect()->route('user.index');
    }

    public function updateEmail(Request $request) {
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();

        $request->validate(['email' => 'required|string|email|unique:users']);

        $user->update($request->all());

        return redirect()->route('app.exit');
    }

    public function updatePassword(Request $request) {
        $email = $_SESSION['email'];
        $user = User::where('email', $email)->first();

        $validated = $request->validate([
            'current_password' => [
                'required',
                
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Your password was not updated, since the provided current password does not match.');
                    }
                }
            ],
            'new_password' => 'required|string|min:8|confirmed|different:current_password',
            'new_password_confirmation' => 'required|string|min:8',
        ]);

        $user->fill([
            'password' => Hash::make($validated['new_password'])
        ])->save();

        return redirect()->route('app.exit');
    }
}
