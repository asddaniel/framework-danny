<?php 
namespace App\Framework;
use App\framework\Request;


class Route{

    private $route;
    private $request;
    public function __construct(){
        $this->route = "";
        $this->request = new Request();
    }
}

?>