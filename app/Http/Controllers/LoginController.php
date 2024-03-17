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

        // 사용자 인증 시도
        $credentials = $request->only('user_id', 'password');
        if (Auth::attempt($credentials)) {
            // 로그인 성공 시 세션에 사용자 정보가 저장됩니다.
            $user = Auth::user();
            // 사용자 정보에 접근할 수 있습니다.
            
            return redirect('/');
            // 이후에 사용자 정보를 얻거나 세션에서 사용자 정보를 사용할 수 있습니다.
        } else {
            // 로그인 실패 처리
            return redirect('/');
        }
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('/login');
    }
}