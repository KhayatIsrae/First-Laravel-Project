<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PharIo\Manifest\Email;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        return view('register');
    }
    public function store(){
        $validated=request()->validate([
            'name'=>'required|min:3|max:12',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|confirmed|min:8',
            'image'=>'image'
        ]);
        if (request()->has('image')) {
            $imagePath = request('image')->store('profile', 'public');
            $validated['image'] = $imagePath;
        }else{
            $validated['image'] = null;
        }
        User::create([
            'name'=>$validated['name'],
            'email'=>$validated['email'],
            'image'=>$validated['image'],
            'password'=>Hash::make($validated['password']),

        ]);
        return redirect('/register')->with('success','registered successfully');
    }
    public function login(){
        return view('login');
    }
    public function authentificate(){
        $validated=request()->validate([
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);
        if(auth()->attempt($validated)){
            request()->session()->regenerate();
            return redirect('/')->with('success','logged in successfully');

        }
        return redirect('/login');
    }
    public function logout(){
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/')->with('success','logged out succesfully');
    }
}
