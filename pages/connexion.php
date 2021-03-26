<?php
require_once '../library/user.php';

$titre = 'Connexion';


session_start();

$user = new user;

if (isset($_POST['formconnexion'])){

  $login = htmlspecialchars($_POST['login']);
  $password = htmlspecialchars($_POST['password']); 
  
  $user->connect($_POST['login'], $_POST['password']);
  $_SESSION['user'] = $user ;
  header("Location: profil.php");
}

?>

<?php include '../includes/header.php'; ?>


   <!--Formulaire-->      

<main class="user valign-wrapper">



<h1>Bienvenue sur la page de connexion</h1>


<?php
if (isset($erreur))
{
  echo $erreur;
}
?>
 
  </form>
</div>
<form method="post" action="connexion.php" class="formlogin">
  <fieldset>
     <div >
       <input placeholder="login" id="login" type="text" name="login" class="validate white-text" required/>
       <label for="login">Login</label>
     </div>
 
   
     <div>
       <input id="password" type="password" class="validate white-text" name="password" required/>
       <label for="password">Password</label>
     </div>
  

  
<button type="submit" name="formconnexion">Submit</button>

      </fieldset>
  </form>

</main>
            
<?php include '../includes/footer.php'; ?>

