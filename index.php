
<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Inconsolata&display=swap" rel="stylesheet">
    <link rel= "stylesheet" type="text/css" href= "css/header.css">
    <link rel= "stylesheet" type="text/css" href= "css/index.css">
    <link rel= "stylesheet" type="text/css" href= "css/footer.css">

    <title><?php if (isset ($titre)) {echo $titre;} ?> - Réservation salles</title>

</head>


<body class="<?= $bodyname ?>">

<header>

    <nav>
        <input type="checkbox" id="menu-toggle"/>
        <label id="trigger" for="menu-toggle"></label>
        <label id="burger" for="menu-toggle"></label>
     
          <ul id="menu">
              <li><a href="pages/planning.php" class="navlink">Planning</a></li>
              <li><a href="pages/reservation.php" class="navlink">Réservations déjà plannifiées</a></li>
          
              <!-- Utilisateur déconnecté -->
              <li class="navlink <?php if (!isset($_SESSION['user'])) { echo 'disabled'; } ?>"><a href="reservation-form.php">Réserver</a></li>
              <?php if (!isset($_SESSION['user'])) : ?>
              <li><a href="pages/inscription.php" class="btn white indigo-text">Inscription</a></li>
              <li><a href="pages/connexion.php" class="btn white indigo-text">Connexion</a></li>
              
              <!-- Utilisateur connecté-->
              <?php else : ?>
              <li><a href="pages/profil.php" class="btn white indigo-text">Profil</a></li>
              <li><a href="pages/deconnexion.php" class="btn white indigo-text">Déconnexion</a></li>
              <?php endif; ?>
          </ul>
    </nav>

</header>

  

<main>


    <section class="vertical">
            <h1>LES BEAUX ARTS DE PARIS</h1>
  
    </section>



</main>      




<footer>
    <article class="footerinfos">

        <section class="imgsocial">
            <a href="https://www.linkedin.com/in/alicia-cordial-0538b8205/"><img src="../image/icons8-linkedin-26.png" alt="linkedin"/></a>
            <a href="https://github.com/alicia-cordial/"><img src="../image/icons8-github-30.png" alt="github"/></a>
        </section>


        <section class="production">
            <p>Alicia Cordial</p>
            <p>School : LaPlateforme_ Marseille</p>
            <p>alicia.cordial@laplateforme.io</p>
        </section>

    </article>
</footer>


</body>

</html>