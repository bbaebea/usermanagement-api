<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //


    /**
     * Login
     * POST: /api/login
     * @param Request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request){
        $validator = validator($request->all(), [
            'name' => "required",
            'password' => "required"
        ]);

        if($validator->fails()){
            return response()->json([
                "ok" => false,
                "message" => "Request didn't pass the validation",
                "errors" => $validator->errors()
            ], 400);
        }

        if(auth()->attempt($validator->validated())){
            $user = auth()->user();
            $user->token = $user->createToken("api-token")->accessToken;
            return response()->json([
                "ok" => true,
                "message" => "Logged In succesfully!",
                "data" => $user
            ], 200);
        }

        return response()->json([
            "ok" => false,
            "message" => "Invalid Credentials!"
        ], 401);
    }
}
