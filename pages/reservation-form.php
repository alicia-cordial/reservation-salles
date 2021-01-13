<?php

require_once '../library/user.php';
require_once '../library/booking.php';

$titre = 'Réservations salle';


session_start();

date_default_timezone_set('Europe/Paris');

if(isset($_SESSION['user'])){

    $user = $_SESSION['user'];
    $booking = new booking;

    if(isset($_POST['submit'])) {

    $description = htmlspecialchars($_POST['description']);
    $db = htmlspecialchars($_POST['debut']);
    $fn = htmlspecialchars($_POST['fin']);
    $date = htmlspecialchars($_POST['date']);
    $titre = htmlspecialchars($_POST['titre']);

    $debut = $date. " " .$db;
    $fin = $date. " " .$fn;

    $id_utilisateur = $user->getId();

    if ($titre && $description && $date && $db && $fn){

    $booking->registersalle($description, $titre, $debut, $fin, $id_utilisateur);
    header("Location: planning.php?id=".$user->getId());
    }
}


}
 ?>
<?php include '../includes/header.php'; ?>
<section class="reservation-form">
<h1>Réservez vos créneaux horaires<h1>
</section>

</main>
<section id="resa">
      

      <form id="formulaire" method="post" action="reservation-form.php">
        <h1 id="form-title"> RÉSERVER UN ESPACE</h1>

        <label>TITRE</label>
        <input id="input-line" type="text" name="titre" id="titre" placeholder="titre"/>
 
        <div id="time">
          <label>date début</label>
          <input id="dateinput" type="date" name="date">
                        
          <label>début</label>
          <input class="resahour" type="time" name="debut" min="08" max="18" step="3600"/>

          <label>fin</label>
          <input  class="resahour" type="time" name="fin" min="09" max="19" step="3600"/>
        </div>
            
        <label>DESCRIPTION</label>
        <textarea type="textarea" name="description" class="description" id="description" placeholder="description"></textarea>

        <div id="box-button">
          <button class="icon-btn add-btn">
          <div class="add-icon"></div>
          <input class="btn-txt" type="submit" value="RÉSERVER" name="submit">
        </div>
      </form>

    </section>


</main>

            
<?php include '../includes/footer.php'; ?>



</html>