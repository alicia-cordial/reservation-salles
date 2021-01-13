<?php
require_once '../library/user.php';

session_start();
$user = new user;



if (isset($_POST['formconnexion'])){

  $login = (htmlspecialchars($_POST['login']));
  
  $password = sha1($_POST['password']); 
  

   $user->connect($_POST['login'], $_POST['password']);
$_SESSION['user'] = $user ;
}

?>

<?php include '../includes/header.php'; ?>

<body>

<section class="connexion">
  <h1>Bienvenue sur la page de connexion</h1>

</section>

   <!--Formulaire-->      

<main class="valign-wrapper">
   <div class="row">
    <form class="col s12" action="connexion.php" method="post">
      <div class="row">
        <div class="input-field col s12">
          <input placeholder="login" id="login" type="text" name="login" class="validate" required/>
          <label for="login">Login</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate" name="password" required/>
          <label for="password">Password</label>
        </div>
      </div>
 
     
  <button class="btn waves-effect waves-light black " type="submit" name="formconnexion">Submit
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

</body>
</html>