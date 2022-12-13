<?php   
namespace models;
class structure{

    
		public  $definition = array(
     "domaine"=>"http://localhost/thekingproject",
     "db_name"=>"kelasi",
     "hote"=>"localhost",
     "login"=>"root",
     "pass"=>""
    );
    public static function asset($data){
        return $this->definition['domaine']."public/".$data;
    }



    
     
    
  
	

}

?>