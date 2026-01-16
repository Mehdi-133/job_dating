<?php

namespace App\core;

use App\models\User;

class Auth
{
    public static function login($user)
    {
        Session::start();
        Session::set('user_id', $user['id']);
        Session::set('user_email', $user['email']);
        Session::set('user_name', $user['name']);
        Session::set('authenticated', true);
    }

    public static function logout()
    {
        Session::start();
        Session::remove('user_id');
        Session::remove('user_email');
        Session::remove('user_name');
        Session::remove('authenticated');
    }

    public static function check()
    {
        Session::start();
        return Session::get('authenticated', false);
    }

    public static function user()
    {
        if (!self::check()) {
            return null;
        }

        Session::start();
        return [
            'id' => Session::get('user_id'),
            'email' => Session::get('user_email'),
            'name' => Session::get('user_name')
        ];
    }

    public static function id()
    {
        Session::start();
        return Session::get('user_id');
    }

    public static function attempt($email, $password)
    {
        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if (!$user) {
            return false;
        }

        if (!isset($user['PASSWORD'])) {
            return false;
        }

        if (!Security::verifyPassword($password, $user['PASSWORD'])) {
            return false;
        }

        self::login($user);
        return true;
    }


    public static function guest()
    {
        return !self::check();
    }
}
