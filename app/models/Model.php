<?php    
namespace models;

class model{
    protected $name;
    protected $donnees;
    protected $id;
    protected $created_at;
    protected $updated_at;
    protected $attributes = [];
    protected $db;
    protected $child;
    protected $parent;
    
    public function __construct($data=null){
        $this->db  = new base();
        if($data!=null){
        $this->donnees = $data;
        //var_dump($data);
        }
    }
   

    public function get_child(){
        //var_dump($this);
        $id = ((object)$this->donnees)->id;
        //$child = [];
        foreach ($this->child as $key => $value) {
            $data = $this->db->requetteAll("SELECT * FROM ".$key." WHERE ".$value."='".$id."'");
            $child = [];
            foreach ($data as $cle => $valeur) {
                $child[count($child)] = new ("\\models\\".$key) ($valeur);
            }
           // var_dump($child);
            $this->child[$key] = $child;
        }
        return $this->child;
    }
    public function get_parent(){
        $id = ((object)$this->donnees)->id;
        //$child = [];
        foreach ($this->parent as $key => $value) {
            $data = $this->db->requette("SELECT * FROM ".$key." WHERE id='".$this->$value."'");
            
            
           // var_dump($child);
            $this->parent[$key] = $data ? new ("\\models\\".$key) ($data) : null;
        }
        return $this->child;
    }

    public function __get($attr){
        if(in_array($attr, array_keys($this->donnees))){
            return $this->donnees[$attr];
        }else{
            return null;
        }

    }

    public function create($data){ //crée un nouveau donnée 
  
    $this->attributes[count($this->attributes)] = "created_at";
    $this->attributes[count($this->attributes)] = "updated_at";
   
    
    $data['created_at']=date("Y-m-d");
    $data['updated_at']=date("Y-m-d");
    $donnees = [];
    
   
    if(count($data)==count($this->attributes)){
       
        foreach ($this->attributes as $key => $value) {
            if(!in_array($value, array_keys($donnees))){
                $donnees[$key]=$data[$value];
            }
        }
        //var_dump(transform_array_assoc_to_index($donnees));
       $this->db->insert(transform_array_assoc_to_index($donnees), strtolower($this->get_class_name()), $this->attributes);
    }
    }

    protected function get_class_name(){

        return substr(get_class($this), 7, strlen(get_class($this))-1);

    }
    public function read(){ //retourne la liste des enregistrement de ce modele
        return $this->db->requetteAll("SELECT * FROM ".strtolower($this->get_class_name()));

    }
    public function all(){
        $data = $this->read();
        $donnees = [];
        foreach ($data as $key => $value) {
           // var_dump($value);
           $donnees = array_merge($donnees, array(new ("\\models\\".$this->get_class_name()) ($value)));
        }
        return $donnees;
    }
    public function first(){ //retourne le premier element dans  la liste des enregistrement de ce modele
        $data = $this->db->requette("SELECT * FROM ".strtolower($this->get_class_name())); 
        if($data){
            return new ("\\models\\".$this->get_class_name())($this->db->requette("SELECT * FROM ".strtolower($this->get_class_name()))); 
        }else{
            return null;
        }
        
    }
    public function find($id){ //retourne le premier element dans  la liste des enregistrement de ce modele ayant l'id correspondant
        
        $data = $this->db->requette("SELECT * FROM ".strtolower($this->get_class_name())." WHERE id=".$id);
        if($data){
        return new ("\\models\\".$this->get_class_name()) ($data);
        }else{
            return null;
        }
    }

    public function update($data, $id){
        $old_data = $this->find($id);
        $donnees = [];
        $data['created_at']=date("Y-m-d");
  if($old_data){
        $this->attributes[count($this->attributes)] = "updated_at";
        
        foreach ($this->attributes as $key => $value) {
            if(!in_array($value, array_keys($data))){
                $donnees[count($donnees)] = $old_data[$value];
            }else{
                $donnees[count($donnees)]= $data[$value];
            }
        }
       
        
        

       
        if(count($donnees)==count($this->attributes)){
             //var_dump($this->attributes);
            $this->db->update(strtolower($this->get_class_name()), $this->attributes, $donnees, "id=".$id);
        }
    }
    }

    public function delete($id){
        $this->db->supprimer(strtolower($this->get_class_name()), "id=".$id);
    }
  



}


?>