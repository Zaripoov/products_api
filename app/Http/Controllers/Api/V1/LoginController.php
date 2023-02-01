<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Api\V1\LoginRequest;
use App\Services\User\GetUserService;
use Illuminate\Http\JsonResponse;

class LoginController extends ApiController
{
    public function login(LoginRequest $request): JsonResponse
    {
        $user = GetUserService::defineLogin($request->getType(), $request->getLogin());

        if (!$user) {
            return $this->responseError([
                'check' => false,
            ]);
        }

        if (GetUserService::checkHash($user, $request->getPasswordUser())) return $this->responseSuccess([
            'token' => $user->createToken('web')->plainTextToken
        ]);


        return $this->responseError([
            'check' => false,
        ]);
    }

}
