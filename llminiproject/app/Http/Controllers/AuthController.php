<?php

namespace App\Http\Controllers;

use App\Http\Resources\DefaultResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        sleep(1);
        $user = User::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                session($user->toArray());
                Log::info('User Login: ', $user->toArray() );
                return DefaultResource::make([
                    'message' => 'Success, Login',
                    'metadata' => User::with('role')->where('uuid',$user->uuid)->first()->toArray()
                ]);
            }
            return DefaultResource::make([
                'message' => 'Error, wrong password',
                'type' => 'error',
            ])->response()->setStatusCode(200);
        }
        return DefaultResource::make([
            'message' => 'Error, user does not exist',
            'type' => 'error',
        ])->response()->setStatusCode(200);

    }

    public function logout(Request $request)
    {
        sleep(1);
        session()->flush();
        // dd($request->header('Authoriazation'));
        Log::info('User Logout: ', User::find($request->header('Authorization'))->first()->toArray());
        return DefaultResource::make([
            'message' => 'Success, Logout'
        ]);
    }
    

}
