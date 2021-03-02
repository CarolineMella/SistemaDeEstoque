<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;

class LogoutController extends Controller
{
    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }
}
