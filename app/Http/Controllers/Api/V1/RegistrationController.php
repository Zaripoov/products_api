<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Api\V1\RegistrationRequest;
use App\Services\User\CreateUserService;
use App\Services\User\GetUserService;
use Illuminate\Http\JsonResponse;

class RegistrationController extends ApiController
{
    public function registration(RegistrationRequest $request): JsonResponse
    {
        $checkUser = GetUserService::getUser($request->getEmail(), $request->getPhone());

        if ($checkUser) {
            return $this->responseErrorMessage(
                __('Registration error.')
            );
        };

        $user = CreateUserService::createUser($request->getEmail(), $request->getPasswordUser(), $request->getPhone(), $request->getName());

        if ($user) {
            return $this->responseSuccess([
                'token' => $user->createToken('web')->plainTextToken
            ]);
        }

        return $this->responseErrorMessage(
            __('Registration error.')
        );
    }

}
