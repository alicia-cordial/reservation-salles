<head>
    
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">

    <link rel="stylesheet" href="../css/style.css">
    
    <title><?php if (isset ($titre)) {echo $titre;} ?> - Réservation salles</title>

</head>


<body>
    
    <header>
    
        <nav>
        
            <div class="nav-wrapper black">
                <a href="../index.php" class="brand-logo">
               Beaux Arts - Paris
                    <i class="material-icons right">bubble_chart</i>
                </a>
            
                <a href="#" class="sidenav-trigger" data-target="mobile-links">
                    <i class="material-icons">menu</i>
                </a>
            
            
                <ul class="right hide-on-med-and-down">
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
            
            </div>
        
        </nav>

    <ul class="sidenav" id="mobile-links">
        <li><a href="../index.php">Home
                <i class="material-icons">brush</i>
            </a></li>

        <li><a href="reservation.php">Réservations déjà effectuées
                <i class="material-icons">check_box</i>
            </a></li>

        <li><a href="planning.php">Planning
                <i class="material-icons">color_lens</i>
            </a></li>
       
   
        <!-- Utilisateur déconnecté -->
        <li class="navlink <?php if (!isset($_SESSION['user'])) {
            echo 'disabled';
        } ?>"><a href="reservation-form.php">Réserver<i class="material-icons">create</i></a></li>
        <?php if (!isset($_SESSION['user'])) : ?>
            <li><a href="inscription.php" class="btn white indigo-text">Inscription</a></li>
            <li><a href="connexion.php" class="btn white indigo-text">Connexion</a></li>
            <!-- Utilisateur connecté-->
        <?php else : ?>
            <li><a href="profil.php" class="btn white indigo-text">Profil</a></li>
            <li><a href="deconnexion.php" class="btn white indigo-text">Déconnexion</a></li>
        <?php endif; ?>
    </ul>
    
</header>