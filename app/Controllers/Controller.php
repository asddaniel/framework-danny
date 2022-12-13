<?php  

namespace controllers;




class Controller{



public function start(){

ob_start();
    $c1 = new HomeController();
    $c1->call();

    $c1 = new ControllerProduit();
    $c1->call();

    $c1 = new ControllerCategorie();
    $c1->call();

    $c1 = new ControllerClient();
    $c1->call();

    $c1 = new ControllerCommande();
    $c1->call();

    $c1 = new ControllerData_table();
    $c1->call();

    $c1 = new ControllerLibelle_depense();
    $c1->call();

    $c1 = new ControllerMouvement_commande();
    $c1->call();

    $c1 = new ControllerRole();
    $c1->call();

    $c1 = new ControllerServeur();
    $c1->call();

    $c1 = new ControllerUser();
    $c1->call();


    $c1 = new ControllerDepense();
    $c1->call();

    $c1 = new ControllerAffectation();
    $c1->call();
    $affiche = ob_get_contents();


    if(!empty($affiche)){
        ecrire($affiche);
    }else{
        ecrire("404 not found");
    }
 


   
}
    



}



?>