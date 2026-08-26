<?php

namespace Core;
class Authenticator
{
    public function attempt($email, $password){
        $user = App::resolve("Core\Database")->Query("SELECT * FROM users WHERE email = :email", [
            'email' => $email
        ])->find();

        if($user){
            if (password_verify($password, $user['password'])){
                $this->login($user);
                return true;
            }
        }
        else return false;
    }
    public function login($user){
        $_SESSION['user'] = [
            'email' => $user['email'],
        ];
        session_regenerate_id(true);
    }
    public function logout(){
        $_SESSION = [];
        session_destroy();
        $params = session_get_cookie_params();
        setcookie("PHPSESSID", "", time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

}