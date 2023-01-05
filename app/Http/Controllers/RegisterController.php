<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(Request $request) {
        $success = '';

        if($request->get('success') != null) {
            $success = $request->get('success');
        }

        return view('site.register', ['title' => 'Sign Up', 'success' => $success]);
    }

    public function store(Request $request) {

        $request->validate([
            'name' => 'required|string|min:3|max:40|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password'))
        ]);

        return redirect()->route('site.register', ['success' => 'Registration done successfully']);
    }
}
