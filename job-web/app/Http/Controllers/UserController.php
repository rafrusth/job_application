<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller 
{
    
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
            'type' => $request->type,
            'phone_number' => $request->phone_number,
        ]);

        Auth::login($user);

        return redirect('/cv/answers');
    }

    public function login(Request $request)
    {
        $auth = ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($auth)) {
            return redirect()->route('cv.answers');
        }
        else {
            return back()->with('error', 'Invalid credentials');
        }
    }

    public function getProfile()
    {
        $user = Auth::user();
        $name = $user->name;
        $email = $user->email;
        $phone = $user->phone_number;
        return view('profile', ['user' => $user]);
    }

    public function editProfile(){
        
    }
}
