<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomLoginController extends Controller
{
    //
    public function login(Request $request){
        $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $user = User::where("email", $request->email)->first();

        if($user){
            if(Hash::check($request->password, $user->password)){
                return "Success";
            }
            return "Wrong Passowrd";
        }
        return "User doesn't exist";
    }
}
