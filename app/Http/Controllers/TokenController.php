<?php

namespace App\Http\Controllers;

use App\Http\Requests\TokenRequest;
use App\Http\Resources\TokenResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function store(TokenRequest $request)
    {
        $token = $request->attempter()->createToken($request->token_name ?? '');


        return response()->json([
            'message' => trans('common.token_success'),
            'body' => TokenResource::make($token)
        ], 201);
    }

    public function destroy()
    {
        Auth::user()->tokens()->delete();

        return response()->json([
           'message' =>  trans('common.token_deleted')
        ], 200);
    }
}
