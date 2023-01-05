<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index(Request $request) {
        $error = '';

        if($request->get('error') == 1) {
            $error = 'Email and or password does not exist';
        }

        if($request->get('error') == 2) {
            $error = 'Login required to access the page';
        }

        return view('site.login', ['title' => 'Sign In', 'error' => $error]);
    }

    public function auth(Request $request) {

        $request->validate([
            'email' => 'email',
            'password' => 'required'
        ]);

        $email = $request->get('email');
        $password = $request->get('password');

        $user = new User();

        $client = $user->where('email', $email)->get()->first();

        if (isset($client->name) && Hash::check($password, $client->password)) {
            session_start();
            $_SESSION['name'] = $client->name;
            $_SESSION['email'] = $client->email;
        
            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['error' => '1']);
        }
    }
}
