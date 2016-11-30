<?php

/**
 * Created by PhpStorm.
 * User: mmoujahid
 * Date: 30/11/2016
 * Time: 11:08
 */
namespace Controllers;

use Views\Template;
use Models\Message;

class ChatController extends Controller
{
    public function home($request)
    {
        if(!isset($_SESSION["user"])){
            $this->redirect("/security/login");
        }
        $message = new Message();
        $template = new Template("home");
        $template->render(array(
            "recentMessages" => $message->getRecentMessages(),
            "archivedMessages" => $message->getArchivedMessages()
        ));
    }

    public function send($request)
    {
        if(!isset($_SESSION["user"])){
            $this->redirect("/security/login");
        }
        if(isset($request['message']) && !empty($request['message']))
        {
            $user_id = $_SESSION['user']['id'];
            $msg = new Message();
            $msg->addMessage($user_id, $request['message']);
        }

        $this->redirect("/");
    }
}