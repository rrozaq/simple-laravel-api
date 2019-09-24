<?php

namespace App\Http\Controllers\AuthStudents;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected function guard()
    {
        return Auth::guard('student');
    }

    protected function sendLoginResponse(Request $request)
    {
        $this->clearLoginAttempts($request);
        $user = $this->guard()->user();

        return response()->json([
            'msg' => 'Success Login',
            'data' => $user
        ]);
    }

    public function username()
    {
        return 'nim';
    }
}
