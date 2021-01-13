<?php

require_once '../library/user.php';
require_once '../library/booking.php';

session_start();



if(isset($_SESSION['user'])){

    $user = $_SESSION['user'];

    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
    $requser = $bdd->prepare("SELECT titre, DATE_FORMAT(fin, '%w'), DATE_FORMAT(debut,'%T'), DATE_FORMAT(fin,'%T'),utilisateurs.login, reservations.id FROM reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id WHERE week(reservations.debut) = WEEK(CURDATE())");
    $requser->execute(array());
  $result = $requser->fetchAll();

}
?>




<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  
  <link rel= "stylesheet" href= "../css/booking.css">
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
          <li><a href="reservation-form.php" class="btn white indigo-text">Réservations salle</a></li>
          <li><a href="planning.php" class="btn white indigo-text">Planning</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <ul class="sidenav" id="mobile-links">
    <li><a href="../index.php">Home
    <i class="material-icons">home </i>
    </a></li>
    <li><a href="reservation-form.php" class="btn white indigo-text">Réservations salle</a></li>
    <li><a href="planning.php" class="btn white indigo-text">Planning</a></li>
  </ul>





<main>

<section class="grey  white-text">

<div class="row ">
    <div class="col s12 l12 center-align">
        <h3>Planning des réservations de salles de travail</h3>
    </div>
</div>

<div class="row">
    <div class="col s12 l12 center-align">
        <p>
            <?php $today = date("d-M-Y");
            echo 'Aujourd\'hui : ' . $today;

            $jour = date("w");
            $dateDebSemaineFr = date("d/m/Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 1, date("y")));
            $dateFinSemaineFr = date("d/m/Y", mktime(0, 0, 0, date("n"), date("d") - $jour + 7, date("y")));
            echo '<div id="titreMois">Semaine en cours du  : ' . $dateDebSemaineFr . ' au ' . $dateFinSemaineFr . ' </div> '; ?>

        </p>
    </div>
</div>
</section>


<?php

$num = 0;

$jourTexte = array('', 1 => 'Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi');
$jourNum = array('', 1 => '1', '2', '3', '4', '5');
$plageH = array(1 => '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00');


$nom_mois = date('M');

echo '<br/>
<section class="row white">
<div class= "col s12 l10 offset-l1">
<div id="titreMois"><strong>' . $nom_mois . ' ' . date('Y') . '</strong></div>';

echo '<table>';

// en tête de colonne THEAD
echo '<tr>';

for ($k = 0; $k < 6; $k++) {
    if ($k == 0)
        echo '<th>' . $jourTexte[$k] . '</th>';
    else
        echo '<th><div>' . $jourTexte[$k] . ' ' . date("d", mktime(0, 0, 0, date("n"), date("d") - $jour + $k, date("y"))) . ' ' . $nom_mois . '</div></th>';
}
echo '</tr>';

// les plages horaires TBODY
for ($h = 1; $h <= 10; $h++) {
  echo '<tr>

  <th>
      <div>' . $plageH[$h] . '</div>
  </th>';

  // les infos pour chaque jour
  for ($j = 1; $j < 6; $j++) {
      echo '<td>';

      $resa = 0;

      foreach ($result as $value) {

          $value[2] =  date("H:i", strtotime($value[2]));
          $value[3] =  date("H:i", strtotime($value[3]));

          if ($value[2] == $plageH[$h] and $value[1] == $jourNum[$j]) {

              $resa = 1;

              echo '<div class="box red lighten-2 white-text">';
              echo 'Titre :' . $value[0] . '</br>';
              echo 'De ' . $value[2] . ' à ' . $value[3] . ' H </br>';
              echo 'Créateur : ' . $value[4] . '</br>';

              if (isset($_SESSION["user"])) {
                  echo ' <a class="blue-text text-darken-4" href = "reservation.php?id=' . $value[5] . '">Lien de la réservation</a></td>';
              }

              echo '</div>';
          }
      }
      if ($resa == 0) {
          echo '<a class="green-text" href="reservation-form.php">Disponible </a>';
      }
      echo '</td>';
  }
  '</tr>';
}
echo '</table>';
echo '</div></section>';

?>

</main>

            
    <!-- Compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>

<script>
$(document).ready(function(){
$('.sidenav').sidenav();
});
</script>

<script>

  $(document).ready(function() {
    $('input#input_text, textarea#textarea2').characterCounter();
  });
</script>    
</body>
</html>
