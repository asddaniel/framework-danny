<?php 
namespace models;






use \pdo;
class base{


	private $user;
	private $db_name;
	private $hote = "localhost";
	private $login = "root";
	private $pass = "";
	private $pdo;
	private $exemple = "dd";
	private $enregistrement;
	protected $table;
	private $main_table;
	protected $colonne = array();



	
	
 public function __construct(){
 
 	 //ouverture de la classe de configuration du serveur : structure
    $structure = new structure();
 	$this->hote = $structure->definition['hote'];
 	$this->login = $structure->definition['login'];
 	$this->pass = $structure->definition['pass'];
 	$this->db_name = $structure->definition['db_name'];
 	$this->construire_base_de_donnees();
 	

  
  		
 }

 protected function construire_base_de_donnees(){
 	 $structure = new structure();
 	$this->hote = $structure->definition['hote'];
 	$this->login = $structure->definition['login'];
 	$this->pass = $structure->definition['pass'];
 	$this->db_name = $structure->definition['db_name'];
 	try{
$connexion=new PDO("mysql:host=".$this->hote,$this->login,$this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$connexion->exec("CREATE DATABASE IF NOT EXISTS ".$this->db_name."");
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
$bdd = new PDO('mysql:host='.$this->hote.';dbname='.$this->db_name, $this->login, $this->pass,
$pdo_options);
	 // création des  table pour enregistrement comptes utilisateur
include("./migration.php");


 	}catch(Exception $e){
	die('Erreur : '.$e->getMessage());
	var_dump($e);
	echo"<h1>echecs de la connexion<h1>";} 
 }

public  function init_connection(){
	
	if(isset($GLOBALS["pdo"])){
		return $GLOBALS["pdo"];
	}else{



	$dsn = 'mysql:host='.$this->hote.';dbname='.$this->db_name;
	$pdo = new PDO($dsn, $this->login, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$this->pdo=$pdo;
	$GLOBALS["pdo"] = $pdo;
	return $pdo;
}
}



private  function start_connection(){
	$dsn = 'mysql:host='.$this->hote.';dbname='.$this->db_name;
	$pdo = new PDO($dsn, $this->user, $this->pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$this->pdo=$pdo;
	return $pdo;
}
public function requette($req){
	$cont=0;
	$connect =$this->init_connection();

	$masque1 = "'";
	$masque2 = '"';
	if(longueur_chaine_filtre($req, $masque1)==longueur_chaine($req)){
		if(longueur_chaine_filtre($req, $masque2)){
			//var_dump($req);
			$reponse=$connect->query($req);
	
	$donnees = $reponse->fetch();
	
}else{
	$chaine = explode('"', $req);
	$requette ='';
	$array = array();
	for($i=0; $i<count($chaine); $i++){
         if(($i+2)%2==0){
           $requette =$requette.''.$chaine[$i];
           if($i!=count($chaine)-1){$requette=$requette.'?';}
         }else{
         	$array[count($array)]=$chaine[$i];
         }

	}
	$reponse = $connect->prepare($requette);
	$reponse->execute($array);
	$donnees = $reponse->fetch();
	}
}else{
	$chaine = explode("'", $req);
	$requette ='';
	$array = array();
	for($i=0; $i<count($chaine); $i++){
         if(($i+2)%2==0){
           $requette =$requette.''.$chaine[$i];
           if($i!=count($chaine)-1){$requette=$requette.'?';}
         }else{
         	$array[count($array)]=$chaine[$i];
         }

	}
	$reponse = $connect->prepare($requette);

	$reponse->execute($array);
	$donnees = $reponse->fetch();
}
	
return $donnees;
}
public function requetteAll($req){
	$cont=0;
	$connect =$this->init_connection();
	$masque1 = "'";
	$masque2 = '"';
	if(longueur_chaine_filtre($req, $masque1)==longueur_chaine($req)){
		if(longueur_chaine_filtre($req, $masque2)){
			$reponse=$connect->query($req);
	
	$donnees = $reponse->fetchAll();
	
}else{
	$chaine = explode('"', $req);
	$requette ='';
	$array = array();
	for($i=0; $i<count($chaine); $i++){
         if(($i+2)%2==0){
           $requette =$requette.''.$chaine[$i];
           if($i!=count($chaine)-1){$requette=$requette.'?';}
         }else{
         	$array[count($array)]=$chaine[$i];
         }

	}
	$reponse = $connect->prepare($requette);
	$reponse->execute($array);
	$donnees = $reponse->fetchAll();
	}
}else{
	$chaine = explode("'", $req);
	$requette ='';
	$array = array();
	for($i=0; $i<count($chaine); $i++){
         if(($i+2)%2==0){
           $requette =$requette.''.$chaine[$i];
           if($i!=count($chaine)-1){$requette=$requette.'?';}
         }else{
         	$array[count($array)]=$chaine[$i];
         }

	}
	$reponse = $connect->prepare($requette);
	$reponse->execute($array);
	$donnees = $reponse->fetchAll();
}
	
return $donnees;
}
public function insert($data, $table, $attributes){	
/** @$table : le nom de la table qui doit recevoir les données  @$data : est un tableau contenant la liste des donnée à inserer dans chaque colonne de la table de donnée suivant l'ordre des colonne
	*/
		$connect = $this->init_connection();
	
	$requet = "INSERT INTO ".$table."(".implode(", ", $attributes).") VALUES(:".implode(", :", $attributes).")";
	$insert = $connect->prepare($requet);
    $array = array_reduce($attributes, "reduce");
	//$array = $this->getArray($attributes, $data); //crée un tableau associatif qui associe chaque attribut au données
	

	// array_reduce
		$insert->execute($array);
			
    
	
	return true;
}

private function getArray($table1, $table2){
	/** @var : $table1 et $table2 doivent avoir la meme taille
	*/
if(count($table1)==count($table2)){
	for($i=0; $i < count($table1); $i++){
		$nouveau[$table1[$i]]=$table2[$i];

	}
return $nouveau;	
}else{ return false;}
}
public function update($table, $colonne, $data, $reference){
	/*
@$table : contient le nom de la table 
@colonne : contient un tableau censé contenir la liste des éléments à modifier dans la table
@data : contient un tableau contenant toutes les valeurs à modifier de maniere ordonné
@reference : contient la refernces des donnée ex: id=5


	**/
	$connect = $this->init_connection();
	$modification = '';
	$array_fetch = array();
	// var_dump($data);
	for($i=0; $i<count($colonne);$i++){

		if($i==0){$modification = ''.$colonne[$i].'=:'.$colonne[$i];
        $array_fetch[$colonne[$i]] = $data[$i]; }else{
		$modification =$modification.', '.$colonne[$i].'=:'.$colonne[$i];
        $array_fetch[$colonne[$i]] = $data[$i];
 }
	}
	$requette = "UPDATE ".$table." SET ".$modification." WHERE ".$reference;
	
	$base = $connect->prepare($requette);

	$base->execute($array_fetch);
}

public function supprimer($table, $reference){
	/*
	@table : contient le nom de la table 
	@reference : contient le reference ex : id=3

	**/

	$connect = $this->init_connection();
	$modification = '';
	
	$requette = "DELETE FROM ".$table." WHERE ".$reference;
	
	$base = $connect->query($requette);
	//$base->execute($requette);

}
public static function construire_table($table_name, $array_colonne){
	$colonne = array();
	foreach ($array_colonne as $key => $value) {
		$colonne[compter_tableau($colonne)] = $value;
	}
if(!empty($colonne)){
	return (new table($table_name, $colonne));
}else{
	return 'impossible de crée une table à colonne vide';
}
}


}

?>