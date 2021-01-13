<?php

require_once '../library/user.php';

require_once '../library/booking.php';

session_start();

$booking = new booking;

if(isset($_SESSION['user'])){

    $user = $_SESSION['user'];

    if(isset($_POST['submit'])) {

    $description = htmlspecialchars($_POST['description']);
    $db = htmlspecialchars($_POST['debut']);
    $fn = htmlspecialchars($_POST['fin']);
    $date = htmlspecialchars($_POST['date']);
    $titre = htmlspecialchars($_POST['titre']);

    $debut = $date. " " .$db;
    $fin = $date. " " .$fn;

    $id_utilisateur = $user->getId();


    $booking->registersalle($description, $titre, $debut, $fin, $id_utilisateur);
    header("Location: planning.php?id=".$user->getId());
}


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
          <li><a href="planning.php" class="btn white indigo-text">Planning</a></li>
          <li><a href="reservation.php" class="btn white indigo-text">Réservation</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <ul class="sidenav" id="mobile-links">
    <li><a href="../index.php">Home
    <i class="material-icons">home </i>
    </a></li>
    <li><a href="planning.php" class="btn white indigo-text">Planning</a></li>
    <li><a href="reservation.php" class="btn white indigo-text">Réservation</a></li>
  </ul>

<section class="reservation-form">
<h1>Réservez vos créneaux horaires<h1>
</section>

</main>


<div class="row">
    <form class="col s12" method="post" action="reservation-form.php">
      <div class="row">
        <div class="input-field col s6">
          <input  id="titre" name="titre" type="text" class="validate" required>
          <label for="titre">Titre de l'évènement</label>
        </div>
      </div>
      
     <div class="row">
        <div class="input-field col s12">
          <textarea id="description" class="materialize-textarea" name="description" required></textarea>
          <label for="description">Description</label>
        </div>
      </div>
   
      <input type="date" id="date" name="date"
       value="2020-12-20"
       min="2020-12-20" max="2022-12-31" required>

      <input type="time" id="debut" name="debut"
       min="09:00" max="19:00" required>

       <input type="time" id="fin" name="fin"
       min="10:00" max="19:00" required>

       <button class="btn waves-effect waves-light black" type="submit" name="submit">Submit
    <i class="material-icons right">send</i>
  </button>

       </div> 
     
    </form>
  </div>
        
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