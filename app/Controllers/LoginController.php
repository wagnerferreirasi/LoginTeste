<?php

namespace App\Controllers;

use App\Models\Users;
use League\Plates\Engine;

class LoginController
{
    private $uid;
    private $theme;

    public function __construct()
    {
        $this->theme = new Engine(__DIR__ . '/../Views', 'php');
    }

    public function login()
    {
        $array = [
            'msg' => ''
        ];

        if (!empty($_POST['login']) && !empty($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            if ($this->login_action($login, $password)) {
                $array['msg'] = "Bem Vindo(a) ao FLogSys!";
                echo $this->theme->render("dashboard", $array);
                $array['msg'] = '';
            } else {
                $array['msg'] = "Login\Senha inválido";
                echo $this->theme->render("home", $array);
                $array['msg'] = '';
                exit;
            }
        } else {
            $array['msg'] = "Preencha todos os campos do login.";
            echo $this->theme->render("home", $array);
            $array['msg'] = '';
            exit;
        }
    }

    public function login_action($login, $password)
    {
        $token = '';

        $u =  new Users();
        $users = $u->find("login = :LOGIN", "LOGIN=$login", "id, name, password")->fetch();
        if (!is_null($users)) {
            $pass = $users->data()->password;
            $uid = $users->data()->id;

            $validatePass = password_verify($password, $pass);

            if ($validatePass) {
                $this->uid = $uid;

                $_SESSION['uid'] = $uid;
                $_SESSION['logged'] =  true;

                $token = md5(time() . rand(0, 9999));
                $_SESSION['token'] = $token;

                $user = (new Users())->findById($this->uid);
                $user->token = $token;
                $user->save();

                return true;
            }
        }
        return false;
    }

    public function isLogged()
    {
        if ($_SESSION['logged']) {
            return true;
        }
        return false;
    }

    public function logout()
    {
        unset($_SESSION['logged']);
        unset($_SESSION['token']);
        header("Location: " . url(''));
    }
}
