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



//MES RESERVATIONS PERSO

public function table(){
    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
    $requser = $bdd->prepare("SELECT login, titre, description, debut, fin FROM `reservations` INNER JOIN `utilisateurs` ON reservations.id_utilisateur = utilisateurs.id;");
    $requser->execute();




    $i = 0;

    echo "<table>" ;
        
    while ($result = $requser->fetch(PDO::FETCH_ASSOC))
    {
        if ($i == 0)
      {
        
        foreach ($result as $key => $value)
        {
          echo "<th>$key</th>";
        }
        $i++;
    
      }
      echo "<tr>";
      foreach ($result as $key => $value) {
        echo "<td>$value</td>";
      }
      echo "</tr>";
    }
    
    echo "</table>";

}
    
/*
     
//PLANNING

public function planning(){

    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
    $requser = $bdd->prepare("SELECT login, titre, description, debut, fin FROM `reservations` INNER JOIN `utilisateurs` ON reservations.id_utilisateur = utilisateurs.id;");
    $requser->execute();
    $event = $requser->fetch(PDO::FETCH_ASSOC);
    var_dump($event);
//marche jusqu'à event mais seulement personne connectées

//Il faut que pour chaque case soit  RAMENE RESERVATION-FORM soit NOM+TITRE RÉSA
    $reservation = ('<a class="tobook" href="reservation-form.php">Réserver</a>');
    $signal = 0;

    foreach ($event as $value){
   

    if ((($this->debut == $debut) && ($this->fin == $fin) && ($this->today == $today))){
    $signal = 1;
    echo '****' . $value[0] . '****</br>';
    echo 'à ' . $value[2].'</br>';
    echo 'Créateur : ' .$user->getId().'</br>';
    
    if(isset($this->login)){
        echo ' <a id="idevent" href = "reservation.php?id='.$this->id.'">lien event</a></td>';
    }
    }

    }
    if ($signal == 0){
    echo $reservation;  
    }  
     
}
*/
}
?>