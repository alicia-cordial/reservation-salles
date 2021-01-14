<?php

require_once '../library/user.php';

$titre = 'Profil';


session_start();


$user = new user;


if(isset($_SESSION['user'])){

  $user = $_SESSION['user'];



if(isset($_POST['formprofil'])){
  $user->update($_POST['login'], $_POST['password'], $_POST['password2'], $user->getId());
}

}
/*else{
  header("Location: connexion.php?");
}*/
 
?>


<?php include '../includes/header.php'; ?>

<h1>Bienvenue <?php echo $user->getLogin()?></h1>

<main class="valign-wrapper"> 


    
<div class="row">
  <form class="col s12" action="profil.php" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="input-field col s12">
          <input placeholder="login" id="login" type="text" name="login"  maxlength="20" class="validate white-text"/>
          <label for="login">New Login</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate white-text" name="password"  maxlength="20"/>
          <label for="password">Nouveau Password</label>
        </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
          <input id="password2" type="password" class="validate white-text" name="password2"  maxlength="20"/>
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


<?php include '../includes/footer.php'; ?>

</html>
