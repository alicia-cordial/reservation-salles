<?php

//CLASS UTILISATEURS
class user{
    private $id ;
    public $login ;
    public $password;
  



// S'ENREGISTRER
public function register($login, $password){
    
    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
    $requetelogin= $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ?");
    $requetelogin->execute(array($login));
    $loginexist= $requetelogin->rowCount();

    if($loginexist == 0) {
        $insert= $bdd->prepare("INSERT INTO utilisateurs (login, password) VALUES(?, ?)");
        $insert->execute(array($login, $password));
        return [$login, $password];
    }

} 


public function connect($login, $password){
   
    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
    $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? AND password = ?");
    $requser->execute(array($login, $password));
    $userexist = $requser->rowCount();

    if($userexist == 1){
            
        $user= $requser->fetch();

              $this->id = $user['id'];
              $this->login = $user['login'];
              $this->password = $user['password'];
              return true;
            }
            
            else
            {   
                  return false;
            }
    }


public function disconnect(){
  
    if (isset($this->id)) { 
    
        $this->id = NULL;
        $this->login = NULL;
        $this->password = NULL;
    
    }
    
    return true;
    
    }
    
public function delete(){

    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
    $requser = $bdd->prepare ("DELETE FROM utilisateurs WHERE id = $this->id");
    $requser->execute();
    
return $requser;
    }
    
    
public function update($login, $password){

    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');   
    $insert = $bdd->prepare("UPDATE utilisateurs SET login = ?, password = ?  WHERE id = $this->id");
    $insert->execute(array($login, $password));
    
return true;
    
    }
    
public function isConnected(){
    if (isset($this->id)){
        return 1;
    }
        
    else{
        return 0;
    }
        
}
        
        
public function getAllInfos(){
    return $this;
    }
        
        
public function getLogin(){
    return $this->login;
    }
        

        
public function refresh(){
    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
    $requser = $bdd->prepare ("SELECT * FROM utilisateurs WHERE id = $this->id");
    $requser->execute();
    
    
    if(isset($this->id)){
            
        $user= $requser->fetch();
    
        $this->id = $user['id'];
        $this->login = $user['login'];
        $this->password = $user['password'];
        return true;
        }
             
    }               
    
}



$lila = new user('lila', 'lila');
$lila->register('lila', 'lila');
echo '<pre>';


var_dump($lila->connect('lila', 'lila'));
echo '<pre>';

//var_dump($lila->disconnect());
echo '<pre>';

//var_dump($lila->delete());
echo '<pre>';

var_dump($lila->update('lila', 'lila'));
echo '<pre>';

var_dump($lila->isConnected());
echo '<pre>';

var_dump($lila->getAllInfos());
echo '<pre>';

var_dump($lila->getLogin());
echo '<pre>';

var_dump($lila->refresh());
echo '<pre>';

var_dump($lila);
echo '<pre>';


/*try
{
$bdd = new PDO('mysql:host=localhost; dbname=test', 'root', '');
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}*/
?>