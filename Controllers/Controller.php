<?php
/**
 * Created by PhpStorm.
 * User: mmoujahid
 * Date: 30/11/2016
 * Time: 15:06
 */

namespace Controllers;


class Controller
{

    public function redirect($url)
    {
        header(sprintf("Location: %s", $url));
    }
}