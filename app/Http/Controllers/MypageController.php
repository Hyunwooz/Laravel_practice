<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MypageController extends Controller
{
    /**
     * Display the user's profile for editing.
     *
     * @return \Illuminate\View\View
     */
    public function showMypageForm()
    {
        return view('mypage');
    }

    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'email_id' => 'required|string',
            'email_suffix' => 'required|string',
            'birthdate' => 'required|date',
            'name' => 'required',
        ]);

        $email_complete = $validatedData['email_id'].'@'.$validatedData['email_suffix'];

        $user->name = $validatedData['name'];
        $user->email = $email_complete;
        $user->birthdate = $validatedData['birthdate'];
        $user->save();

        return redirect()->back()->with(['message' => '프로필 업데이트 성공!']);
    }
}