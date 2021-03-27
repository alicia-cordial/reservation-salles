<?php

require_once '../classes/user.php';

$titre = 'Réservations salle';


session_start();

date_default_timezone_set('Europe/Paris');

$bdd = new PDO('mysql:host=localhost;dbname=reservationsalles', 'root', '');

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


        $req = $bdd->prepare("INSERT INTO reservations (titre, description, debut, fin, id_utilisateur) VALUES (?, ?, ?, ?, ?)");
        $req->execute(array($titre, $description, $debut, $fin, $id_utilisateur));
    
        header("Location: planning.php");
      }
    }

}
 ?>



<?php include '../includes/header.php'; ?>

<h1>Réservez vos créneaux horaires<h1>


<main>
<section id="resa">
      

  <form id="formulaire" method="post" action="reservation-form.php">
    <h2 id="form-title"> RÉSERVER UN ESPACE</h2>

    
      <div>
        <label>TITRE</label>
        <input id="input-line" type="text" name="titre" id="titre" placeholder="titre"/>
      </div>



      <div>
        <label>date début</label>
        <input id="dateinput" type="date" name="date">
      </div>

           
 
        <div>
          <label>début</label>
          <input class="resahour" type="time" name="debut" min="08" max="18" step="3600"/>
      </div>


     
        <div>
          <label class="black-text">fin</label>
          <input  class="resahour" type="time" name="fin" min="09" max="19" step="3600"/>
        </div>
    
        

      <div>
        <label class="black-text">DESCRIPTION</label>
        <textarea type="textarea" name="description" class="description" id="description" ></textarea>
      </div>


    <button type="submit" name="submit">Submit
  </button>
  
    </form>

</section>


</main>

            
<?php include '../includes/footer.php'; ?>

