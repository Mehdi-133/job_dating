<?php

namespace App\core;

class Security
{
    public static function generateToken()
    {
        Session::start();
        $token = bin2hex(random_bytes(32));
        Session::set('csrf_token', $token);
        return $token;
    }


    public static function getToken()
    {
        Session::start();
        if (!Session::has('csrf_token')) {
            return self::generateToken();
        }
        return Session::get('csrf_token');
    }
    

    public static function validateToken($token)
    {
        Session::start();
        $storedToken = Session::get('csrf_token');
        
        if (!$storedToken || !$token) {
            return false;
        }
        
        return hash_equals($storedToken, $token);
    }

    public static function regenerateToken()
    {
        Session::remove('csrf_token');
        return self::generateToken();
    }
}
