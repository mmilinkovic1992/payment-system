<?php

namespace App\Http\Controllers;

use App\Http\Requests\TokenRequest;
use App\Http\Resources\TokenResource;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function store(TokenRequest $request)
    {
        $token = $request->attempter()->createToken($request->token_name ?? '');

        return [
            'message' => trans('common.token_success'),
            'body' => TokenResource::make($token)
        ];
    }
}
