<?php 
//CLASS RESERVATIONS


class reservation{
    public $id;
    public $id_utilisateur;
    public $titre;
    public $commentaire;
    public $date;
    public $debut;
    public $fin;

    $debut = $debut . $date;
    $fin = $fin . $date;

//RESERVATION SALLE

    
public function reservation_salle($titre, $commentaire, $id, $debut, $fin){

    if($id > 0){
        $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
        $req->$bdd->prepare("INSERT INTO reservations(titre, commentaire, debut, fin) VALUES(?, ?, ?, ?)");
        $req->execute(array($commentaire, $titre, $debut, $fin, $id));
    }


}



//MES RESERVATIONS PERSO

public function table(){
    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
    $requser = $bdd->prepare("SELECT login, titre, description, debut, fin FROM `reservations` INNER JOIN `utilisateurs` ON reservations.id_utilisateur = utilisateurs.id;");
    $requser->execute();
    
    echo "<table>" ;
        
    while ($result = $requser->fetch(PDO::FETCH_ASSOC))
    {
        $i = 0;

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
     


}
?>