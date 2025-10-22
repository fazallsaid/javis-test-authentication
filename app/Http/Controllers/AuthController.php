<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        $title = "Authentication Test";
        $data = [
            'title' => $title
        ];

        return view('auth', $data);
    }

    function login(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $users = Users::where('email', $validatedData['email'])->first();
        if($users && Hash::check($validatedData['password'], $users->password)){
            $request->session()->put('userLogin', true);
            $request->session()->put('userId', $users->user_id);
            return response()->json([
                'success' => true,
                'message' => 'Login Berhasil!',
                'redirect_url' => url('admin/dashboard')
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah.'
            ], 401);
        }
    }

    function logout(Request $request){
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/');
    }
}
