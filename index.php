<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
  
  <link rel= "stylesheet" href= "index.css">
  
  <title>Beaux arts - Paris</title>
</head>


<body>

<div class="navbar-fixed">
  <nav class="nav-wrapper  black">
    <div class="container">
      <a href="#" class="brand-logo">Beaux arts - Paris
      <i class="material-icons text-white right">brush</i>
      </a>
      <a href="#" class="sidenav-trigger" data-target="mobile-links">
        <i class="material-icons">menu</i>
      </a>
      <ul class="right hide-on-med-and-down">
        <li><a href="index.php">About</a></li>
        <li><a href="index.php">Contact</a></li>
        <li><a href="../reservation-salles/pages/inscription.php" class="btn white indigo-text">Inscription</a></li>
        <li><a href="../reservation-salles/pages/connexion.php" class="btn white indigo-text">Login</a></li>
      </ul>
    </div>
  </nav>
</div>

  <ul class="sidenav" id="mobile-links">
    <li><a href="index.php">About
      <i class="material-icons">brightness_6 </i>
    </a></li>
    
    <li><a href="index.php">Contact
      <i class="material-icons">mail_outline </i>
    </a></li>
    
    <li><a href="../reservation-salles/pages/inscription.php" class="btn white indigo-text">Inscription</a></li>
    
    <li><a href="../reservation-salles/pages/connexion.php" class="btn white indigo-text">Login</a></li>
  </ul>
  


<main>


<section class="artimages">

    <section class="vertical">

        <section class="images">  

            <img src="images/art1.jpg"/>

            <img src="images/art3.jpg"/>
  
      </section>

  
       <section class="title">
  
            <h1>LES BEAUX ARTS DE PARIS</h1>
  
       </section>

    </section>



<img src="images/art2.png"/>

<img src="images/art4.jpg"/>


</section>

</main>      



<footer class="page-footer black center">
  <div class="container">
    <div class="col l12 s6">
      <h5 class="white-text">Links</h5>
      <ul>
        <li><a href="facebook.com">
          <img src="images/facebook.png" alt="facebook"/>
        </a></li>
        <li><a href="instagram.com">
        <img src="images/instagram.png" alt="instagram"/>
        </a></li>
        <li><a href="twitter.com">
        <img src="images/twitter.png" alt="twitter"/>
        </a></li>
      </ul>
    </div>
  </div>
  <div class="footer-copyright center">
    <div class="container">
      © 2020 Piglet Copyright
    </div>
  </div>
</footer>
            
  <!-- Compiled and minified JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/js/materialize.min.js"></script>
  <script>
    $(document).ready(function(){
      $('.sidenav').sidenav();
    });
  </script>

  <script>  $(document).ready(function(){
    $('.carousel').carousel();
  });
</script> 
</body>
</html>