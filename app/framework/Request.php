<?php 
namespace App\framework;

class Request{
    public $route;
    public $input;
    public $files;
    public $session;
    private $serveur;
    public function __construct(){
        $this->session = $_SESSION;
        $this->input = $_REQUEST;
        $this->file = $_FILES;
        $this->serveur = (object)$_SERVER;
        
    }
    public function method(){
        return $this->serveur->REQUEST_METHOD;
    }
}



?>