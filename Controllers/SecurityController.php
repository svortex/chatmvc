<?php

/**
 * Created by PhpStorm.
 * User: mmoujahid
 * Date: 30/11/2016
 * Time: 11:08
 */
namespace Controllers;

use Models\User;
use Views\Template;

class SecurityController extends Controller
{

    public function login($request)
    {
        if(isset($_SESSION["user"])){
            $this->redirect("/");
        }
        $errors = null;
        $user = new User();
        $template = new Template("login");
        if(isset($request["login"]) && isset($request["password"]))
        {
            $userFound = $user->getUserByLoginPassword($request["login"], $request["password"]);
            if($userFound){
                $_SESSION["user"] = $userFound;
                $this->redirect("/");
            }

            $errors = "Login or password incorrect";
        }


        $template->render(array(
            "errors" =>   $errors
        ));

    }


    public function logout($request)
    {
        session_destroy();
        unset($_SESSION['user']);
        $this->redirect("/security/login");
    }
}