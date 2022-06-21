<?php

namespace App\Http\Controllers;

use App\Models\Chef_login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Chef_loginController extends Controller
{
    function login(Request $req){

        $chef= Chef_login::where('chef_name', $req->chef_name)->first();
        // print_r($data);
            if (!$chef && ($req->password == $chef->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $chef->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'chef' => $chef,
                'token' => $token
            ];
        
             return response($response, 201);
    }
}
