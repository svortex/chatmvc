<?php

/**
 * Created by PhpStorm.
 * User: mmoujahid
 * Date: 30/11/2016
 * Time: 11:05
 */
namespace Controllers;
use Controllers\SecurityController;
use Controllers\ChatController;
use Views\Template;

class Router
{
    private $securityController;
    private $chatController;

    public function __construct()
    {
        $this->securityController = new SecurityController();
        $this->chatController = new ChatController();
    }
    // Traite une requête entrante
    public function routeRequest() {

        try {
           if(isset($_REQUEST) && isset($_REQUEST['controller']) && isset($_REQUEST['action']))
           {
               switch ($_REQUEST['controller'])
               {
                   case "security":
                       call_user_func(array($this->securityController, $_REQUEST['action']), $_REQUEST);
                       break;
                   case "chat":
                       call_user_func(array($this->chatController, $_REQUEST['action']), $_REQUEST);
                       break;

                   default:
                       $this->chatController->home($_REQUEST);
               }
           }


        }
        catch (\Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    private function erreur($msgErreur) {
        $vue = new Template("erreur");
        $vue->render(array('message' => $msgErreur));
    }
}