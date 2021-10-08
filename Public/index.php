<?php

//instacia do router
use CoffeeCode\Router\Router;

//autoload composer
require_once __DIR__ . "/../vendor/autoload.php";

//inicia o router
$router = new Router(ROOT);

//seta o name space padrao e o grupo de rotas
$router->namespace("App\Controllers");
$router->group(null);

//rota index/login
$router->get("/",                       "IndexController:home");
$router->post("/login",                 "LoginController:login");

//rota cadatro de usuarios
$router->get("/register",               "IndexController:register");
$router->post("/register_action",       "IndexController:register_action");

//rota dashboard
$router->get("/dashboard",              "DashboadController:home");

//rotas actions usuarios
$router->get("/users",                  "UserController:users");
$router->get("/new-user",               "UserController:newUser");
$router->post("/newUser_action",        "UserController:newUser_action");
$router->get("/edit-user/{id}",          "UserController:editUser");
$router->post("/editUser_action",        "UserController:editUser_action");
$router->get("/delete-user/{id}",       "UserController:deleteUser");

//rota logout
$router->get("/logout",                 "LoginController:logout");

$router->dispatch();