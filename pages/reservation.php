<?php

require_once '../library/user.php';
require_once '../library/booking.php';

session_start();



if(isset($_SESSION['user'])){

    $user = $_SESSION['user'];
   $booking = new booking;

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

<section id="event">

<article class="reservation">
<h2>Les réservations déjà effectuées<h2>
</article>

<?php

if(isset($_SESSION['user'])){

    $user = $_SESSION['user']; 
    $booking->table();
}
?>
 </section>
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
