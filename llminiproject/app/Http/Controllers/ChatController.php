<?php

namespace App\Http\Controllers;

use App\Http\Resources\DefaultResource;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Chat::with('user')->orderBy('created_at')->limit(100)->get()->toArray();
        Log::info('Load Chat : ', 
            [
                'user' => User::where('uuid',$request->header('Authorization'))->first()->toArray(),
                'data' => $data
            ]
        );
        return DefaultResource::make([
            'message' => 'Success, load all data',
            'metadata' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info('Store Chat : ', 
            [
                'user' => User::where('uuid',$request->header('Authorization'))->first()->toArray(),
                'data' => $request->all()
            ]
        );
        sleep(1);
        $chat = Chat::create([
            'message' => $request->message,
            'user_uuid' => User::where('uuid',$request->header('Authorization'))->first()->uuid
        ]);;
        return DefaultResource::make([
            'message' => 'Success, store data',
            'metadata' => $chat
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(Chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chat $chat)
    {
        //
    }
}
