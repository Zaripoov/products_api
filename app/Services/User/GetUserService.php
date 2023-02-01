<?php

namespace App\Services\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GetUserService
{
    public static function getUser($email, $phone): ?User
    {
        return User::where(function ($query) use ($email, $phone){
            $query->orWhere('email', '=', $email);
            $query->orWhere('phone', '=', $phone);
        })->first();
    }

    public static function checkHash(User $user, $password): bool
    {
        if (!Hash::check($password, $user->password)) {
            return false;
        }

        return true;
    }
}
