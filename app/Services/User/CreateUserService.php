<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Throwable;

class CreateUserService
{
    public static function createUser($email, $password, $phone , $name): bool|User
    {
        try {
            $user = new User();
            $user->name = $name;
            $user->phone = $phone;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->saveOrFail();

            return $user;

        } catch (Throwable $e) {
            print_r($e->getMessage());
            exit();
            Log::error('CreateUserService. createUser: ' . $e->getMessage());
        }

        return false;
    }

}
