<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function loginPage()
    {
        return view("dashboard.login");
    }

    public function loginProcess(Request $request)
    {
        if(User::where('username', $request->username)){
            if(password_verify($request->password, User::where("password"))){

                return redirect("dashboard");
            }
        } 
        
    }
}
