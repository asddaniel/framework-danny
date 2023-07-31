<?php  

namespace App\controllers;


use App\models\Structure;
use App\models\base;
use App\framework\Request;
use App\Exemple\Exercice;
use App\Exception\Error;

class controllerApp{


private $structure;
private $database;
private $route;

public function __construct(){
     
	// $this->database = new base();
	$this->route = $_SERVER["REQUEST_URI"];

    

}



public function get($page){
	 
$request = new Request();
echo($request->method());

// Le code fait office de sévérité.
// Reportez-vous aux constantes prédéfinies pour en savoir plus.
// http://fr2.php.net/manual/fr/errorfunc.constants.php
set_error_handler('error2exception');
set_exception_handler('customException');
//throw new Error($message, 0, $code, $fichier, $ligne);

       $generateur = custom_generator(["a", "b", "c"]);
	   foreach ($generateur as  $value) {
		echo $value.", ";
	   }

	   $generateur = custom_generator_increment(500000);

    //  for($i=0; $i<500000; $i++){
	// 	echo $i.", ".PHP_EOL;
	//  }
	   foreach ($generateur as  $value) {
		echo $value.", ".PHP_EOL;
	   }

	//    echo(\exec("cordova --version"));

	
	// $pdo = $this->database->init_connection();

	// header('Access-Control-Allow-Origin: *');
	// header("content-type:application/json");
	
	// if($this->route=="/get"){
	// 	 $file = file_put_contents("./data.json", json_encode(["data"=>$this->get_all_data(), "key"=>"Link-Dcs"]));
	// 	echo json_encode(["data"=>$this->get_all_data(), "key"=>"Link-DCS"]);
	// }
	// if($this->route=="/put"){
	// 	$this->delete_all_data();
		
	// 	$this->update();
	// }

	
	// if($this->route=="/secret-key"){
	// 	$this->secret_key();
	// }
	
}
private function update(){
    $this->authenticate();
	foreach ($this->get_request()['data'] as $key => $value) {
		//echo $key."\n";
		$this->insert($value, $key);
		
	}
	echo json_encode(["response"=>"success"]);
}

private function authenticate(){

	$request = $this->get_request();
	$request ?? abort("HTTP/1.1 400 bad request");
	if(!array_key_exists("key", $request)){
		header("HTTP/1.1 401 Unhautorized");
		   echo json_encode(["response"=>"failed, you dont have autorization to access to this ressource"]);
		   die;
	}else{
		if(password_verify($request["key"], $this->secret_key())){
			// echo json_encode($request);
			
		}else{
			header("HTTP/1.1 401 Unhautorized");
			echo json_encode(["response"=>"authentification failed"]);
			die;
		}
	
	}

}
private function secret_key(){
	return password_hash("Link-DCS", PASSWORD_BCRYPT);
}
private function get_all_data(){
	$tables = explode(", ", substr(file_get_contents("./.env", true), 9));
	$donnees = [];
	foreach ($tables as $key => $value) {
		// array_push($donnees, [$value=>$this->get_data($value)]);
		$donnees[trim($value)] = $this->get_data($value);
	}
    return $donnees;
}
private function get_all_table(){
	return explode(", ", substr(file_get_contents("./.env", true), 9));
}
private function delete_all_data(){
	$tables = $this->get_all_table();
	foreach ($tables as $key => $value) {
		// array_push($donnees, [$value=>$this->get_data($value)]);
		$this->database->init_connection()->query("DELETE  FROM $value");
	}

}
private function get_request(){
	return json_decode(file_get_contents('php://input'), true);
}


private function get_data($table_name){
    return $this->filter_data($this->database->init_connection()->query("SELECT * FROM $table_name")->fetchAll());
}

private function  filter_data($data):mixed
{
	$final = [];
	foreach ($data as $key => $value) {
		array_push($final, []);
		foreach ($value as $cle => $valeur) {
			
			if(intval($cle)==0 && $cle!="0"){
				$final[count($final)-1][$cle]=$valeur;
			}
		}
	}
	return $final;
}
private function insert($data, $table)
{
	if(!empty($data)){
		//var_dump($data);
		$columns = $this->get_column($data[0]);
	}else{ return null; }



	foreach ($data as $key => $value) {
		$this->add($table, $columns, $value);

	}

}

private function add($table, $attributes, $data){
	//var_dump(substr(array_reduce($attributes, "reduce2"), 1, strlen(array_reduce($attributes, "reduce2"))-1));
	$prerequette = "INSERT INTO ".$table."(".substr(array_reduce($attributes, "reduce"), 1, strlen(array_reduce($attributes, "reduce"))-1).") VALUES(".substr(array_reduce($attributes, "reduce2"), 1, strlen(array_reduce($attributes, "reduce2"))-1).")";
	
	$request = $this->database->init_connection()->prepare($prerequette);
	$request->execute($data); //

}

private function get_column($array){
	
	return array_keys($array);
}

private function compare($data1, $data2){
   
}






}



?>