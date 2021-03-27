<?php
$titre = "connexion";
require_once '../classes/user.php';
require_once '../classes/validator.php';
session_start();


if (isset($_POST['formconnexion'])) {

    $validator = new validator();
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);

    if ($validator->passwordConnect($login, $password) == 0) {
        $error = "Vérifiez votre login ou votre mot de passe.";
    } else {
        $user = new user();
        $user->connect($login);
        $_SESSION['user'] = $user;
        header("Location: profil.php");
    }

}

?>


<?php include '../includes/header.php'; ?>

<main>
   
        <h1><em>Connexion</em></h1>


        <!--Formulaire-->
        <form action="connexion.php" method="post">
            
                <div>
                    <input placeholder="login" id="login" type="text" name="login" required/>
                    <label for="login">Login</label>
                </div>
           
      
                <div>
                    <input id="password" type="password" name="password" required/>
                    <label for="password">Password</label>
                </div>

            <button type="submit" name="formconnexion">Submit
            </button>

        </form>

        <section class="bouton">
          <a href="inscription.php">
            <button>
            SI VOUS N'AVEZ PAS ENCORE DE COMPTE
            </button>
          </a>
        </section>


        <section class="errors">
    <!--Alerte (erreur ou succès)-->
    <?php if (isset($error)): ?>
        <div class="error">
            <p><?= $error?></p>
        </div>
    <?php endif; ?>
</section>


</main>

<?php include '../includes/footer.php'; ?>