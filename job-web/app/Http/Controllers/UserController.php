<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller 
{
    public function postRegistrationStep1(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $request->session()->put('registration_data', $validatedData);

        return redirect()->route('custom.register.step2');
    }

    public function showRegistrationStep2(Request $request)
    {
        if (empty($request->session()->get('registration_data'))) {
            return redirect()->route('custom.register');
        }

        return view('custom-register-2');
    }

    public function postRegistrationStep2(Request $request)
    {
        $registration_data = $request->session()->get('registration_data');

        if (empty($registration_data)) {
            return redirect()->route('custom.register');
        }

        // Map the form fields to the database fields
        // Form: pwd, tel, goal
        // DB: password, phone_number, type
        $validatedData = $request->validate([
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required|string|max:20',
            'type' => 'required|string|in:backend,frontend,fullstack,ai-ml,aiml',
        ]);

        $userData = array_merge($registration_data, [
            'password' => Hash::make($validatedData['password']),
            'phone_number' => $validatedData['phone_number'],
            'type' => $validatedData['type'] === 'aiml' ? 'ai-ml' : $validatedData['type'],
        ]);

        $user = User::create($userData);

        Auth::login($user);

        $request->session()->forget('registration_data');

        return redirect()->intended(route('cv.answers'));
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => Hash::make($request->password), 
            'type'         => $request->type,
            'phone_number' => $request->phone_number,
        ]);

        Auth::login($user);

        return redirect()->intended('/cv/answers');
    }

    public function login(Request $request)
    {
        $auth = ['email' => $request->email, 'password' => $request->password];

        if (Auth::attempt($auth)) {
            return redirect()->intended(route('cv.answers'));
        }
        else {
            return back()->with('error', 'Invalid credentials');
        }
    }

    public function getProfile()
    {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
    }

    public function editProfile(){
        
    }
}
