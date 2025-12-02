<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {

        $messages = [
            'name.required' => 'Please enter your name.',
            'name.max' => 'CAnt be more than 20 character',
            'name.string' => 'contain only letter',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email is already taken.',
            'password.required' => 'Password is required.',
            'password.confirmed' => 'Passwords do not match.',
            'password.min' => 'Password must be at least 8 characters.',
        ];

        $data = $request->validate([
            'name' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => 'required|unique:users,email',
            'password' => 'required|confirmed|min:8',

        ], $messages);

        // $user = User::create($data);
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),  // 🔥 IMPORTANT
        ]);

        if ($user) {
            return response()->json([
                'success' => true,
                'message' => 'Registration successful! Please login.',
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Registration failed. Please try again.',
        ], 500);

    }
    public function showLogin(){
         return view('welcome');
    }

    public function login(Request $request)
    {

        $messages = [

            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',

            'password.required' => 'Password is required.',

        ];

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ], $messages);

        // Check if user exists with that email
        $user = User::where('email', $credentials['email'])->first();

        if (! $user) {
            return response()->json([
                'success' => false,
                'errors' => ['email' => ['Email does not match any account.']],
            ], 422);
        }

        if (! Auth::attempt($credentials)) {
            return response()->json([
                'success' => false,
                'errors' => ['password' => ['Password is incorrect.']],
            ], 422);
        }

        return response()->json([
            'success' => true,
            'message' => 'Login successful!',
            'redirect_url' => route('blogs.index'), // where to redirect after login
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('blogs')->with('success', ' Logged out successful');
    }
}
