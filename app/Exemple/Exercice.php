<?php
namespace App\Exemple;
Class Exercice{

  private int $data;
  public function __construct($data = 0){
    $this->data = $data;
  }
    public function increment($pas){
           $this->data = $this->data+$pas;
    }
    public function get(){
        return $this->data;
    }

    public static function __callStatic($nom, $arguments)
{
       
  var_dump($nom);
    }
}


?>