<?php

namespace App\Controllers;

use App\Models\Users;
use League\Plates\Engine;

class DashboadController extends LoginController
{
    private $theme;

    public function __construct()
    {

        if (!$this->isLogged()) {
            header("Location: " . url(''));
        }

        $this->theme = new Engine(__DIR__ . '/../Views', 'php');
    }

    public function home()
    {
        echo $this->theme->render("dashboard");
    }
}