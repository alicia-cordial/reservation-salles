

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


<section class="planning">


<h1>Le Planning de réservation de la grande salle</h1>


<?php

echo "<p id ='dateday'>Nous sommes le ".date('d-m-Y');
echo " semaine n°" . date('W').  " de l'année " .date('o'). '.</p></br>';

$hour = 0;
$jour = 0;

$jour++;
$today

?>
</section>
  

<table>
  <thead>
    <tr>
        <th></th>
        <th>Lundi</th>
        <th>Mardi</th>
        <th>Mercredi</th>
        <th>Jeudi</th>
        <th>Vendredi</th>
    </tr>
  </thead>

  <tbody>

    <?php
		$connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
		$requete = "SELECT * FROM utilisateurs INNER JOIN reservations ON utilisateurs.id = reservations.id_utilisateur WHERE WEEK(reservations.debut) = WEEK(CURDATE())";
		$resultat = mysqli_query($connexion, $requete);

for($l = 8; $l < 20; ++$l)
{
    echo '<tr>';
          echo '<td>' .$l.'h </td>';
          
    for($i = 0; $i < 5; ++$i)
      {
        echo '<td>';
        $d = 0;

        foreach($resultat as $events)
            {
            $date = date_create($events['debut'])->format('d/m/Y');
            list($jour, $mois, $annee) = explode('/', $date);
            $timestamp = mktime (0, 0, 0, $mois, $jour, $annee);
            $joursem = date("w",$timestamp);
            $heure = date_create($events['debut'])->format('G');

            $resa = ('<a class="tobook" href="reservation-form.php">Disponible</a>');
            $signal = 0;

            if($joursem == $i && $heure == $l)
                {
                  $signal = 1;
                $id = $events['id'];
                echo "<a href='reservation.php?id=".$id. "'><div>";
                echo $events['login']. '<br/>';
                echo $events['titre'];
                echo '</div></a>';
              }
            }
            if ($signal == 0){
              echo $resa;  
            } 

            ++$d;
          }
        echo '</td>';
      }
    echo'</tr>';


  ?>
  
  </tbody>
</table>

     </main>
</body>
</html>
