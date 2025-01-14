<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }


    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {

            return redirect()->route('dashboard.index')->with('message', 'Giriş başarılı!');
        }

        return response()->json([
            'message' => 'Geçersiz giriş bilgileri.',
        ], 401);
    }



}
