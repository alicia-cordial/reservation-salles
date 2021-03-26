
<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Inconsolata&display=swap" rel="stylesheet">
    <link rel= "stylesheet" type="text/css" href= "../css/header.css">
    <link rel= "stylesheet" type="text/css" href= "../css/style.css">
    <link rel= "stylesheet" type="text/css" href= "../css/footer.css">

    <title><?php if (isset ($titre)) {echo $titre;} ?> - Réservation salles</title>

</head>


<body class="<?= $bodyname ?>">

<header>

    <nav>
        <input type="checkbox" id="menu-toggle"/>
        <label id="trigger" for="menu-toggle"></label>
        <label id="burger" for="menu-toggle"></label>
     
                <ul id="menu">
                    <li><a href="planning.php" class="navlink">Planning</a></li>
                    <li><a href="reservation.php" class="navlink">Réservations déjà plannifiées</a></li>
                
                    <!-- Utilisateur déconnecté -->
                    <li class="navlink <?php if (!isset($_SESSION['user'])) { echo 'disabled'; } ?>"><a href="reservation-form.php">Réserver</a></li>
                    <?php if (!isset($_SESSION['user'])) : ?>
                    <li><a href="inscription.php" class="btn white indigo-text">Inscription</a></li>
                    <li><a href="connexion.php" class="btn white indigo-text">Connexion</a></li>
                    
                    <!-- Utilisateur connecté-->
                    <?php else : ?>
                    <li><a href="profil.php" class="btn white indigo-text">Profil</a></li>
                    <li><a href="deconnexion.php" class="btn white indigo-text">Déconnexion</a></li>
                    <?php endif; ?>
                </ul>
    </nav>

</header>