<?php

namespace App\Controllers;

use App\Models\Users;
use League\Plates\Engine;

class UserController extends LoginController
{
    public function __construct()
    {
        if (!$this->isLogged()) {
            header("Location: " . url(''));
        }

        $this->theme = new Engine(__DIR__ . '/../Views', 'php');
    }

    public function users()
    {
        $array = [
            'user' => ''
        ];
        $users = new Users();
        $listUsers = $users->find()->fetch(true);

        $array['user'] = $listUsers;


        //$array['user'] = $listUsers;

        echo $this->theme->render("users", $array);
    }

    public function newUser()
    {
        echo $this->theme->render("new-user");
    }

    public function newUser_action($data)
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
            echo $this->theme->render("dashboard", $array);
            $array['msg'] = '';
            exit;
        }
    }

    public function editUser($id)
    {

        $array = [
            'id' => '',
            'name' => '',
            'login' => '',
            'msg' => ''
        ];

        $id = $id['id'];
        $user = (new Users())->findById($id);

        if ($user) {
            $array['id'] = $id;
            $array['name'] = $user->data()->name;
            $array['login'] = $user->data()->login;

            echo $this->theme->render("edit-user", $array);
        } else {
            $array['msg'] = "Nenhum usuário encontrado";
            echo $this->theme->render("edit-user", $array);
        }
    }

    public function editUser_action($data)
    {
        $array = [
            'msg' => ''
        ];

        $id = $data['id'];
        $name = $data['name'];
        $login = $data['login'];
        $password = $data['password'];

        $user = (new Users())->findById($id);
        if ($user) {
            $user->name = $name;
            $user->login = $login;

            if (!empty($password)) {
                $user->password = password_hash($password, PASSWORD_BCRYPT);
            }

            $user->save();

            $array['msg'] = "Cadastro Atuaizado com sucesso.";
            echo $this->theme->render("dashboard", $array);
            $array['msg'] = '';
            exit;
        } else {
            $array['msg'] = " Error: Usuario NÃO Atualizado";
            echo $this->theme->render("dashboard", $array);
            $array['msg'] = '';
            exit;
        }
    }

    public function deleteUser($id)
    {
        $array = [
            'msg' => ''
        ];

        $id = $id['id'];

        $user = (new Users())->findById("$id");

        if ($user) {
            $user->destroy();
            $array['msg'] = "Usuário Deletado com Sucesso.";
            echo $this->theme->render("dashboard", $array);
            $array['msg'] = '';
            exit;
        }

        $array['msg'] = "Error: Usuário NÃO Deletado.";
        echo $this->theme->render("dashboard", $array);
        $array['msg'] = '';
        exit;
    }
}