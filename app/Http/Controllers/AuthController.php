<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request): \Illuminate\Foundation\Application|\Illuminate\Http\Response|\Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory
    {
        $fields = $request->validate(array(
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password'=>'required|string|confirmed'
        ));
        $user = User::create([
            'name'=>$fields['name'],
            'email'=>$fields['email'],
            'password'=>password_hash($fields['password'],PASSWORD_DEFAULT)
        ]);

        $token = $user->createtoken($request->nameToken)->plainTextToken;
        $response=[
            'user'=>$user,
            'token'=>$token
        ];

        return response($response,201);
    }

        public function login(Request $request)
        {
            $fields = $request->validate([
                'email'=>'required|string',
                'password'=>'required|string'
            ]);
            $user = User::where('email',$fields['email'])->first();

            if(!$user ||!Hash::check($fields['password'],$user->password))
            {
                return response([
                    'message'=>'E-mail ou senha invalido. '

                ], 401);
            }
            $token = $user->createtoken('UsuarioLogado')->plainTextToken;
            $response=[
                'user'=>$user,
                'token'=>$token
            ];
            return response($response,201);

        }
}

