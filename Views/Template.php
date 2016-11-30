<?php

/**
 * Created by PhpStorm.
 * User: mmoujahid
 * Date: 30/11/2016
 * Time: 13:37
 */
namespace Views;

class Template
{

    private $file;

    public function __construct($action) {
        $this->file = "Views/" . $action . ".php";
    }

    public function render($data = array()) {
        $content = $this->genererFichier($this->file, $data);
        $view = $this->genererFichier('Views/layout.php',
            array('content' => $content, "root" => "/"));
        echo $view;
    }

    private function genererFichier($fichier, $donnees) {
        if (file_exists($fichier)) {
            extract($donnees);
            ob_start();
            require $fichier;
            return ob_get_clean();
        }
        else {
            throw new \Exception("Fichier '$fichier' introuvable");
        }
    }
}