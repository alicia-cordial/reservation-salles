<?php

require_once '../library/user.php';

$titre = 'Inscription';

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



<main class="user valign-wrapper">

    
  <h1>N'hésitez pas à vous inscrire pour réserver une salle</h1>
        <!--FORMULAIRE--> 
      

        <article class="mainregister">


<div class="form">
<fieldset class="formregister">
    <legend><em><b>Register</b></em></legend>
    <form action="inscription.php" method="post">
   
   <div>
     <input placeholder="login" id="login" type="text" name="login" class="validate white-text" value="<?php if(isset($login)) { echo $login; } ?>"  maxlength="20" required/>
     <label for="login">Login</label>
   </div>

    <div>
     <input id="password" type="password" class="validate white-text" name="password"  maxlength="20" required/>
     <label for="password">Password</label>
   </div>

  <div>
     <input id="password2" type="password" class="validate white-text" name="password2"  maxlength="20" required/>
     <label for="password2">Confirmation Password</label>
  </div>

  <button type="submit" name="forminscription">Submit</button>
   

</fieldset>
</div>

</form>

</article>


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
