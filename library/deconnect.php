<?php

//CLASS UTILISATEURS
class user{
    private $id ;
    private $login ;
    private $password;
    private $password2;



//DECONNEXION
public function disconnect(){
  
    if (isset($this->id)) { 
    
        $this->id = NULL;
        $this->login = NULL;
        $this->password = NULL;
    
    }
    
    }

}
?>