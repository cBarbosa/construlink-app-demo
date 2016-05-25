<?php
/**
 * Created by PhpStorm.
 * User: Charles
 * Date: 25/05/2016
 * Time: 15:34
 */

namespace ConstruLink\OAuth2;

use Illuminate\Support\Facades\Auth;


class PasswordVerifier
{
    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user();
        }

        return false;
    }
}