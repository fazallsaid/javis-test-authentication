<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        if(session('userLogin') != true){
            return redirect('/');
        }

        $session = session('userId');
        $usr = Users::where('user_id', $session)->first();

        $title = "Dashboard";
        $data = [
            'title' => $title,
            'usr' => $usr
        ];

        return view('dashboard', $data);
    }
}
