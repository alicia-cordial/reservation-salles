<?php

require_once '../library/user.php';

session_start();
$user = new user; 

if (isset($_POST['forminscription'])){

  $login = htmlspecialchars($_POST['login']);
  $password = htmlspecialchars($_POST['password']);
  $password2 = htmlspecialchars($_POST['password2']);
  
  $user->register($login, $password, $password2);
  $erreur = "Votre compte a bien été créé ! <a href=\"connexion.php\">Me connecter</a>";
 
}
?>


<?php include '../includes/header.php'; ?>

<section class="inscription">
  <h1>N'hésitez pas à vous inscrire</h1>
</section>

<main class="valign-wrapper">

    
        <!--FORMULAIRE--> 
      

<div class="row">
  <form class="col s12" action="inscription.php" method="post">
    <div class="row">
        <div class="input-field col s12">
          <input placeholder="login" id="login" type="text" name="login" class="validate" value="<?php if(isset($login)) { echo $login; } ?>"  maxlength="20" required/>
          <label for="login">Login</label>
        </div>
    </div>

    <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="password"  maxlength="20" required/>
          <label for="password">Password</label>
        </div>
    </div>

    <div class="row">
      <div class="input-field col s12">
          <input id="password2" type="password" class="validate" name="password2"  maxlength="20" required/>
          <label for="password2">Confirmation Password</label>
      </div>
    </div>

     
  <button class="btn waves-effect waves-light black" type="submit" name="forminscription">Submit
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