<?php

namespace Core;

class Authenticator
{
    public function attempt($email, $password)
    {
        $user = App::resolve(Database::class)
            ->query("SELECT * FROM admin where email = :email", [
                'email' => $email
            ])->find();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $this->login([
                    'email' => $email,
                    'name' => $user['name']
                ]);
                return true;
            }
        }
        return false;
    }

    public function login($user)
    {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'name' => $user['name']
        ];
        session_regenerate_id(true);
    }

    public static function logout()
    {
        Session::destroy();
    }
}
