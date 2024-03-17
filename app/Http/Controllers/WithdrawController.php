<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function showWithdrawForm()
    {
        return view('withdraw');
    }

    public function withdraw(Request $request){
        {
            $user = Auth::user();
            $user->status = 'withdrawn';
            $user->withdrawdate = Carbon::now();
            $user->save();
            
            Auth::logout();
            return redirect('/')->with('status', '회원 탈퇴가 완료되었습니다.');
        }

    }
}