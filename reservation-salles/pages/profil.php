<?php

require_once '../library/user.php';

session_start();


$user = new user;


if(isset($_SESSION['user'])){

  $user = $_SESSION['user'];



if(isset($_POST['formprofil'])){
  $user->update($_POST['login'], $_POST['password'], $_POST['password2'], $user['id']);
}

}
/*else{
  header("Location: connexion.php?");
}*/
 
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
          <li><a href="reservation-salles/index.php">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="#">Contact</a></li>
          <li><a href="../reservation-salles/pages/inscription.php" class="btn white indigo-text">Inscription</a></li>
          <li><a href="../reservation-salles/pages/connexion.php" class="btn white indigo-text">Login</a></li>
        </ul>
      </div>
    </nav>
  </div>

  <ul class="sidenav" id="mobile-links">
    <li><a href="reservation-salles/index.php">Home
    <i class="material-icons">home </i>
    </a></li>
    <li><a href="#">About
    <i class="material-icons">brightness_6 </i>
    </a></li>
    <li><a href="#">Contact
    <i class="material-icons">mail_outline </i>
    </a></li>
    <li><a href="planning.php">Planning
    <i class="material-icons">mail_outline </i>
    </a></li>
    <li><a href="reservation-form.php">Réservations salle
    <i class="material-icons">mail_outline </i>
    </a></li>
    <li><a href="reservation.php">Réservations personnelles
    <i class="material-icons">mail_outline </i>
    </a></li>
    <li><a href="../reservation-salles/pages/reservation-form.php">Réservation</a></li>
          <li><a href="inscription.php" class="btn white indigo-text">Inscription</a></li>
          <li><a href="connexion.php" class="btn white indigo-text">Login</a></li>
  </ul>


<h1>Bienvenue<h1>
  
    <h2 class="center">Profil de <?php echo $user->getLogin()?></h2>


<main class="valign-wrapper"> 
    
<div class="row">
  <form class="col s12" action="profil.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s12">
          <input placeholder="login" id="login" type="text" name="login"  maxlength="20" class="validate"/>
          <label for="login">New Login</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="password"  maxlength="20"/>
          <label for="password">Nouveau Password</label>
        </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
          <input id="password2" type="password" class="validate" name="password2"  maxlength="20"/>
          <label for="password2">Confirmation Password</label>
      </div>
    </div>

     
  <button class="btn waves-effect waves-light black" type="submit" name="formprofil">Submit
    <i class="material-icons right">send</i>
  </button>
        
<?php
if (isset($erreur))
{
  echo $erreur;
}
?>

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
