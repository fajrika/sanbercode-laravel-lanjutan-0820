<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegisteredEvent;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(RegisterRequest $request)
    {
      $data = $request->all();
      
      $user = User::create([
        'name' => request('name'),
        'no_hp' => request('no_hp'),
        'email' => request('email'),
        'password' => bcrypt(request('password')),
      ]);

      $data['user'] = $user;

      event(new UserRegisteredEvent($user));

      return response()->json([
         'response_code' => '00',
         'response_message' => 'user berhasil didaftarkan' ,
         'data'    => $data

       ], 200);

    }
}
