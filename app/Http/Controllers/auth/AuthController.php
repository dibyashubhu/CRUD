<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
     function showRegister(){
        return view('auth.register');
    }

    function register(Request $request){

    $messages = [
    'name.required' => 'Please enter your name.',
    'name.max'=>'CAnt be more than 20 character',
    'name.string'=>'contain only letter',
    'email.required' => 'Email is required.',
    'email.email' => 'Please enter a valid email address.',
    'email.unique' => 'This email is already taken.',
    'password.required' => 'Password is required.',
    'password.confirmed' => 'Passwords do not match.',
    'password.min' => 'Password must be at least 8 characters.',
];

    $data=$request->validate([
      'name' => ['required', 'string', 'max:20', 'regex:/^[a-zA-Z\s]+$/'],
      'email'=>'required|unique:users,email',
      'password'=>'required|confirmed|min:8'

        ],$messages);

        $user=User::create($data);

        if($user){
            return redirect()->back()->with('showLogin', true)->with('success', 'Registration successful! Please login.');
        }else{
          return redirect()->back()->with('error', 'Registration failed!');
        }
       
    }
    
    function showLogin(){
        return view('auth.login');
    }

    function login(Request $request){
        $credentials=$request->validate([
      'email'=>'required',
      'password'=>'required|min:8'
        ]);
      if(Auth::attempt($credentials)){
       return redirect('blogs')->with('success', 'Welcome! Login successful');;
      
      }else{
        // return redirect('login')->with('error','Invalid login credentials!');
       return redirect()->back()
        ->withInput($request->only('email'))
        ->withErrors(['email' => 'Invalid credentials']);
      }
    }

    function logout(){
        Auth::logout();
        // return view('auth.login');
        return redirect('blogs')->with('success', ' Logged out successful');
    }

    
}
