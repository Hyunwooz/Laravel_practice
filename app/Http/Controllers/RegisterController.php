<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Display the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('register');
    }

    /**
     * Handle user registration.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {

        $validatedData = $request->validate([
            'user_id' => 'required|string|unique:users|regex:/^[a-zA-Z]+$/',
            'name' => 'required|string',
            'email_id' => 'required|string',
            'email_suffix' => 'required|string',
            'birthdate' => 'required|date',
            'password' => 'required|string|min:8|regex:/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*#?&_])[A-Za-z\d@$!%*#?&_]{8,15}$/|confirmed',
        ], [
            'user_id.required' => 'User ID is required.',
            'user_id.string' => 'User ID must be a string.',
            'user_id.unique' => 'User ID already exists.',
            'user_id.regex' => 'User ID must contain only alphabetic characters.',
            'name.required' => 'Name is required.',
            'name.string' => 'Name must be a string.',
            'email_id.required' => 'Email ID is required.',
            'email_id.string' => 'Email ID must be a string.',
            'email_suffix.required' => 'Email suffix is required.',
            'email_suffix.string' => 'Email suffix must be a string.',
            'birthdate.required' => 'Birthdate is required.',
            'birthdate.date' => 'Birthdate must be a valid date.',
            'password.required' => 'Password is required.',
            'password.string' => 'Password must be a string.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.regex' => 'Password must contain at least one letter, one number, and one special character.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);

        $email_complete = $validatedData['email_id'].'@'.$validatedData['email_suffix'];

        // Create a new user instance
        $user = new User();
        $user-> user_id = $validatedData['user_id'];
        $user->name = $validatedData['name'];
        $user->birthdate = $validatedData['birthdate'];
        $user->email = $email_complete;
        $user->password = password_hash($validatedData['password'],PASSWORD_DEFAULT);
        $user->save();

        return redirect()->back()->with(['message' => '회원가입 성공!']);
    }
}