<?php 

require_once '../classes/user.php';

$titre = 'Planning';

session_start();

if(isset($_SESSION['user'])){
    
    $user = $_SESSION['user'];
    
    $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');
    $reqdata = $bdd->prepare("SELECT titre, DATE_FORMAT(fin, '%w'), DATE_FORMAT(debut,'%T'), DATE_FORMAT(fin,'%T'),utilisateurs.login, reservations.id FROM reservations INNER JOIN utilisateurs ON reservations.id_utilisateur = utilisateurs.id WHERE week(reservations.debut) = WEEK(CURDATE())");

    $reqdata->execute(array());
    $result = $reqdata->fetchAll();
}

?>


<?php include '../includes/header.php'; ?>
     
<main>

    <section class="white-text">

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
    <section class="row">
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

            echo '<div class="box  deep-purple lighten-4 white-text">';
            echo 'Titre :' . $value[0] . '</br>';
            echo 'De ' . $value[2] . ' à ' . $value[3] . ' H </br>';
            echo 'Créateur : ' . $value[4] . '</br>';

            if (isset($_SESSION["user"])) {
                echo ' <a class="black-text" href = "reservation.php?id=' . $value[5] . '">Lien de la réservation</a></td>';
            }

            echo '</div>';
        }
    }
    if ($resa == 0) {
        echo '<a class="blue black-text" href="reservation-form.php">Disponible </a>';
    }
    echo '</td>';
}
'</tr>';
}
    echo '</table>';
    echo '</div></section>';

    ?>

     </main>
     <?php include '../includes/footer.php'; ?>
</html>
