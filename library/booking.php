<?php 
require_once '../library/user.php';

//CLASS RESERVATIONS


class booking{
   

//TOUTES LES RESERVATIONS

public function table(){
    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
    $requser = $bdd->prepare("SELECT login, titre, description, debut, fin FROM `reservations` INNER JOIN `utilisateurs` ON reservations.id_utilisateur = utilisateurs.id;");
    $requser->execute();

}
    
}
?>