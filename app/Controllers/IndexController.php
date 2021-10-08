<?php

namespace App\Controllers;

use App\Models\Users;
use League\Plates\Engine;

class IndexController
{
    private $theme;

    public function __construct()
    {
        $this->theme = new Engine(__DIR__ . '/../Views', 'php');
    }

    public function home()
    {
        echo $this->theme->render("home");
    }

    public function register()
    {
        echo $this->theme->render("register");
    }

    public function register_action($data)
    {
        $array = [
            'msg' => ''
        ];

        if (!empty($data)) {
            $newUser = new Users();

            //seta as variaveis com os dados vindos do formulario
            $name = $data['name'];
            $login = $data['login'];
            $password = password_hash($data['password'], PASSWORD_BCRYPT);

            //seta grava os dados do usuario no banco de dados
            $newUser->name = $name;
            $newUser->login = $login;
            $newUser->password = $password;
            $newUser->save();

            $array['msg'] = "Cadastro efetuado com sucesso.";
            echo $this->theme->render("home", $array);
            $array['msg'] = '';
            exit;
        }
    }
}