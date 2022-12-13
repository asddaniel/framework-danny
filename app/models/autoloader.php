<?php 
class autoloader{

	static function autoload_one($nom_class){

		$nclass = str_replace("models\\", "models/", $nom_class);
require($nclass.'.php');

	}

	static function autoload_controleur($nom_class){



	}

	static function controleur($nom_class){

		$nclass = str_replace("controllers\\", "", $nom_class);
require("../../Controllers/".$nclass.'.php');

	}

	static function general_controleur($nom_class){
		$repertoire = get_dossiers(get_repertoire(dir("./")));
		
	}
	
} 

?>