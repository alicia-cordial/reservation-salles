<?php

require_once '../library/user.php';

$titre = 'Réservations salle';


session_start();

date_default_timezone_set('Europe/Paris');

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

      if ($titre && $description && $date && $db && $fn){

        $bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');

        $req = $bdd->prepare("INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES (?, ?, ?, ?, ?)");
        $req->execute(array($titre, $description, $debut, $fin, $id_utilisateur));
    
        header("Location: planning.php?id=".$user->getId());
      }
    }

}

 ?>

<?php include '../includes/header.php'; ?>

<h1>Réservez vos créneaux horaires<h1>


</main class="valign-wrapper">
<section id="resa">
      

  <form id="formulaire" method="post" action="reservation-form.php">
    <h1 id="form-title"> RÉSERVER UN ESPACE</h1>

    <div class="row">
      <div class="input-field col s12">
        <label class="black-text">TITRE</label>
        <input id="input-line" type="text" name="titre" id="titre" placeholder="titre" class="blactk-text"/>
      </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
        <label class="black-text">date début</label>
        <input id="dateinput" type="date" name="date">
      </div>
    </div>
           
      <div class="row">
        <div class="input-field col s12">
          <label class="black-text">début</label>
          <input class="resahour" type="time" name="debut" min="08" max="18" step="3600"/>
      </div>
    </div>

      <div class="row">
        <div class="input-field col s12">
          <label class="black-text">fin</label>
          <input  class="resahour" type="time" name="fin" min="09" max="19" step="3600"/>
        </div>
      </div>
        
    <div class="row">
      <div class="input-field col s12">
        <label class="black-text">DESCRIPTION</label>
        <textarea type="textarea" name="description" class="description" id="description" ></textarea>
      </div>
    </div>

    <button class="btn waves-effect waves-light black" type="submit" name="forminscription">Submit
    <i class="material-icons right">send</i>
  </button>
  
    </form>

</section>


</main>

            
<?php include '../includes/footer.php'; ?>

</html>