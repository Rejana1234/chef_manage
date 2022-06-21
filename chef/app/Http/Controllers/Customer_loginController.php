<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer_login;
use Illuminate\Support\Facades\Hash;

class Customer_loginController extends Controller
{
    function login(Request $req){

        $customer= Customer_login::where('customer_name', $req->customer_name)->first();
        // print_r($data);
            if (!$customer && ($req->password == $customer->password)) {
                return response([
                    'message' => ['These credentials do not match our records.']
                ], 404);
            }
        
             $token = $customer->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'customer' => $customer,
                'token' => $token
            ];
        
             return response($response, 201);
    }
}
