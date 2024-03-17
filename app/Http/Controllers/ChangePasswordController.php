<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    /**
     * Display the user's profile for editing.
     *
     * @return \Illuminate\View\View
     */
    public function showChangePasswordForm()
    {
        return view('changepassword');
    }

    /**
     * Update the user's profile.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changePassword(Request $request)
    {
        // 비밀번호 변경 유효성 검사
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        // 현재 로그인된 사용자 정보 가져오기
        $user = Auth::user();

        // 입력된 현재 비밀번호가 맞는지 확인
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', '현재 비밀번호가 일치하지 않습니다.');
        }

        // 비밀번호 변경
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', '비밀번호가 성공적으로 변경되었습니다.');
    }
}