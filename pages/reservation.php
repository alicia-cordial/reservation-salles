<?php

require_once '../library/user.php';
require_once '../library/booking.php';

$titre = 'Réservations';

session_start();


?>




<?php include '../includes/header.php'; ?>




<main>


<section id="event">
        <div id="eventcontainer">
    

<article class="reservation">
<h2>Les réservations déjà effectuées<h2>
</article>

<?php

if(isset($_SESSION['user'])){

    $user = $_SESSION['user']; 

    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
    $requser = $bdd->prepare("SELECT titre, description,DATE_FORMAT(debut,'%d/%m/%Y, %H:%i:%s') as 'date de début', DATE_FORMAT(fin,'%d/%m/%Y, %H:%i:%s') as 'date de fin', utilisateurs.login FROM reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id");
    $requser->execute();
}

$i=0;

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
    if ($key == "posté"){
      date_default_timezone_set('Europe/Paris');
      $value =  date("d-m-Y", strtotime($value));  ;
    echo "<td>$value</td>";
    }
    else
      echo "<td>" .nl2br($value). "</td>";
  }
  echo "</tr>";
}

echo "</table>";
?>
      </div>
 </section>

</main>

<?php include '../includes/footer.php'; ?>

</html>
