

<?php 

require_once '../library/user.php';

require_once '../library/booking.php';

session_start();

$booking = new booking;

if(isset($_SESSION['user'])){

    $user = $_SESSION['user'];
}

?>


 <html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  
  <link rel= "stylesheet" href= "index.css">
  <title>Réservation de salle</title>
</head>
<body>

  <div class="navbar-fixed">
    <nav class="nav-wrapper  deep-purple lighten-5">
      <div class="container">
        <a href="#" class="brand-logo">Réservation de salles
        <i class="material-icons text-white">assignment</i>
        </a>
        <a href="#" class="sidenav-trigger" data-target="mobile-links">
          <i class="material-icons">menu</i>
        </a>
        <ul class="right hide-on-med-and-down">
          <li><a href="../index.php">Home</a></li>
          <li><a href="reservation.php" class="btn white indigo-text">Réservations</a></li>
          <li><a href="reservation-form.php" class="btn white indigo-text">Réserver</a></li>
          <li><a href="connexion.php" class="btn white indigo-text">Connexion</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <ul class="sidenav" id="mobile-links">
    <li><a href="../index.php">Home
    <i class="material-icons">home </i>
    </a></li>
    <li><a href="reservation.php" class="btn white indigo-text">Réservations</a></li>
    <li><a href="reservation-form.php" class="btn white indigo-text">Réserver</a></li>
  </ul>
    
     
        <main>
        <h1>Le Planning de réservation de la grande salle</h1>


  

<?php

echo "<p id ='dateday'>Nous sommes le ".date('d-m-Y');
echo " semaine n°" . date('W').  " de l'année " .date('o'). '.</p></br>';

$hour = 0;
$jour = 0;

$jour++;
$today

?>
<?php
$jour = date("w"); // numéro du jour actuel
 
if (isset($_GET['jour']))
{
    $jour = intval($_GET['jour']);
}
 
$nom_mois = date("F"); // nom du mois actuel
$annee = date("Y"); // année actuelle
$num_week = date("W"); // numéro de la semaine actuelle
 
if (isset($_GET['week']))
{
    $nom_mois = date("F", mktime(0,0,0,date("n"),date("d")-$jour+1,date("y")));
    $annee = date("Y", mktime(0,0,0,date("n"),date("d")-$jour+1,date("y")));
    $num_week = date("W", mktime(0,0,0,date("n"),date("d")-$jour+1,date("y")));
}
 
$dateDebSemaine = date("Y-m-d", mktime(0,0,0,date("n"),date("d")-$jour+1,date("y")));
$dateFinSemaine = date("Y-m-d", mktime(0,0,0,date("n"),date("d")-$jour+5,date("y")));
     
$dateDebSemaineFr = date("d/m/Y", mktime(0,0,0,date("n"),date("d")-$jour+1,date("y")));
$dateFinSemaineFr = date("d/m/Y", mktime(0,0,0,date("n"),date("d")-$jour+5,date("y")));

 
$jourTexte = array('',1=>'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi');
$plageH = array(1=>'08:00','09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00', '19:00');

echo '<br/>
<div id="titreMois" align="center">
    <h2>'.$nom_mois.' '.$annee.'</h2>
</div>';
 
echo '<table border="1" align="center">';
 
    // en tête de colonne
    echo '<tr>';
    for($day = 0; $day < 6; $day++)
    {
        if($day==0)
            echo '<th>'.$jourTexte[$day].'</th>';
        else
            echo '<th><div>'.$jourTexte[$day].' '.date("d", mktime(0,0,0,date("n"),date("d")-$jour+$day,date("y"))).'</div></th>';
         
    }
    echo '</tr>';
 
    // les 2 plages horaires : matin - midi
    for ($hour = 1; $hour <= 12; $hour++)
    {
        echo '<tr>
        <th>
            <div>'.$plageH[$hour].'</div>
        </th>';
 
        // les infos pour chaque jour
            for ($j = 1; $j < 6; $j++)
            {
                echo '<td>
                </td>';
            }
            echo '</td>
            </tr>';
    }
echo '</table>';
?>

<?php



    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
    $requser = $bdd->prepare("SELECT login, titre, debut, fin FROM `reservations` INNER JOIN `utilisateurs` ON reservations.id_utilisateur = utilisateurs.id;");
    $requser->execute();
    $event = $requser->fetch(PDO::FETCH_ASSOC);
    var_dump($event);
//marche jusqu'à event mais seulement personne connectées

//Il faut que pour chaque case soit  RAMENE RESERVATION-FORM soit NOM+TITRE RÉSA
    $reservation = ('<a class="tobook" href="reservation-form.php">Réserver</a>');
    $signal = 0;

    foreach ($event as $value){
   

    if ((($hour == $debut) && ($hour == $fin) && ($day == $today))){
    $signal = 1;
    echo '****' . $value[0] . '****</br>';
    echo 'à ' . $value[2].'</br>';
    echo 'Créateur : ' . $value[4].'</br>';
    
    if(isset($_SESSION["login"])){
        echo ' <a id="idevent" href = "reservation.php?id='.$user->getId().'">lien event</a></td>';
    }
    }

    }
    if ($signal == 0){
    echo $reservation;  
    }  
?>
<?php
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



?>
     </main>
</body>
</html>
