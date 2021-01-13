<?php



//CLASS UTILISATEURS
class user{
    private $id ;
    private $login ;
    private $password;
    private $password2;



// S'ENREGISTRER
public function register($login, $password, $password2){
    
    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');

    $requetelogin= $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ?");
    $requetelogin->execute(array($login));
    $loginexist= $requetelogin->rowCount();

    if($loginexist == 0) {
        if($password == $password2) {
            $login = htmlspecialchars($login);
             // Password hash
             $password_hash = password_hash($password, PASSWORD_BCRYPT);

        $insert= $bdd->prepare("INSERT INTO utilisateurs (login, password) VALUES(?, ?)");
        $insert->execute(array($login, $password));
        }
        else {
            $erreur = "Vos mots de passes ne correspondent pas !";
            return 0;
            }
    }
            
}
//CONNEXION
public function connect($login, $password){
   
    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
    $requser = $bdd->prepare("SELECT * FROM utilisateurs WHERE login = ? AND password = ?");
    $requser->execute(array($login, $password));
    $userexist = $requser->rowCount();

    if($userexist == 1){
            
        $user= $requser->fetch(PDO::FETCH_ASSOC);
        

            $login = htmlspecialchars($login);
            $password = sha1($password);

              $this->id = $user['id'];
              $this->login = $user['login'];
              $this->password = $user['password'];
              header("Location: profil.php?id=".$this->id);
              return $user;
            
            }
            
            else
            {   
                $erreur = "Mauvais login ou mot de passe !";
            }

}


//UPDATE PROFIL
public function update($login, $password, $password2, $id)
{
    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
    if($password == $password2) 
    {
           $insertlogin = $bdd->prepare("UPDATE utilisateurs SET login = ?, password = ? WHERE id = ?");
           $insertlogin->execute(array($login, $password, $id));
    } 
        else 
    {
        $msg = "Vos deux mdp ne correspondent pas !";
    }
  

}

public function getId(){
    return $this->id;
    }
    
        
public function getLogin(){
    return $this->login;
    }


}   

?>
