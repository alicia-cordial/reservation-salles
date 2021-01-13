<?php 
require_once '../library/user.php';

//CLASS RESERVATIONS


class booking{
   

   

//RESERVATION SALLE

    
public function registersalle($description, $titre, $debut, $fin, $id_utilisateur){


    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');

    $req = $bdd->prepare("INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES (?, ?, ?, ?, ?)");
    $req->execute(array($titre, $description, $debut, $fin, $id_utilisateur));
 

//return true;
}


/*
//TOUTES LES RESERVATIONS

public function table(){
    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
    $requser = $bdd->prepare("SELECT login, titre, description, debut, fin FROM `reservations` INNER JOIN `utilisateurs` ON reservations.id_utilisateur = utilisateurs.id;");
    $requser->execute();

}
    */
}
?>