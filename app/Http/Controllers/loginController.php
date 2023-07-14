<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function loginPage()
    {
        return view("dashboard.login");
    }

    public function loginProcess(Request $request)
    {
        if($request->username == "test" && $request->password == "test"){
            return redirect("/dashboard");
        }
        
    }
}
