<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // 로그인 페이지 표시
    public function showLoginForm()
    {
        return view('login');
    }

    // 로그인 처리
    public function login(Request $request){
        $validation = $request -> validate([
            'user_id' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('user_id', 'password');
        $user = User::where('user_id', $credentials['user_id'])->first(); // User 모델에 맞게 수정

        if ($user && Auth::attempt($credentials)) {

            if ($user->status != 'withdrawn') {
                // 로그인 성공 시 세션에 사용자 정보가 저장됩니다.
                $user = Auth::user();
                // 사용자 정보에 접근할 수 있습니다.
            
                return redirect('/');
                // 이후에 사용자 정보를 얻거나 세션에서 사용자 정보를 사용할 수 있습니다.
            } else {
                return redirect()->back()->with(['message' => '탈퇴된 회원입니다.']);
            }
            
        } else {
            // 로그인 실패 처리
            return redirect()->back()->with(['message' => '비밀번호 또는 아이디를 확인하세요..']);
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('/login');
    }
}