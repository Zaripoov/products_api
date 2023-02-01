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

    public static function getUserByEmail($email): ?User
    {
        return User::whereEmail($email)->first();
    }

    public static function getUserByPhone($phone): ?User
    {
        return User::wherePhone($phone)->first();
    }

    public static function defineLogin($type, $login): ?User
    {
        return match ($type) {
            'email' => self::getUserByEmail($login),
            'phone' => self::getUserByPhone($login),
            default => null,
        };
    }

    public static function checkHash(User $user, $password): bool
    {
        if (!Hash::check($password, $user->password)) {
            return false;
        }

        return true;
    }
}
