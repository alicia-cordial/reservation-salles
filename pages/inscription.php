<?php
$titre = 'inscription';
require_once '../classes/user.php';
require_once '../classes/validator.php';
session_start();


if (isset($_POST['forminscription'])) {

    $validator = new validator();
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);

    if ($validator->userExists($login) == 1) {
        $errors[] = "Ce login est déjà pris.";
    }
    if ($validator->passwordConfirm($password, $password2) == 0) {
        $errors[] = "Les deux mots de passe ne sont pas identiques.";
    }
    if ($validator->passwordStrenght($password) == 0) {
        $errors[] = "Le mot de passe doit comporter au moins un chiffre.";
    }

    if (empty($errors)) {
        $user = new user();
        $user->register($login, $password);
        $success = "Votre compte a bien été créé. <a href='connexion.php'>Me connecter</a>";
    }

}
?>


<?php include '../includes/header.php'; ?>

<main>

        <h1><em>Inscription</em></h1>

        <!--Formulaire-->
        <form action="inscription.php" method="post">

                <div>
                    <input placeholder="login" id="login" type="text" name="login"
                           value="<?php if (isset($_POST['login'])) { echo htmlspecialchars($_POST['login']);} ?>" maxlength="20" required/>
                    <label for="login">Login</label>
                </div>
            
                <div>
                    <input id="password" type="password" name="password" maxlength="20" required/>
                    <label for="password">Password</label>
                    <span class="helper-text">au moins un chiffre.</span>
                </div>
        
                <div>
                    <input id="password2" type="password" name="password2" maxlength="20" required/>
                    <label for="password2">Confirmation</label>
                </div>
            <button type="submit" name="forminscription">Submit
            </button>
        </form>

        <section class="bouton">
          <a href="connexion.php">
            <button>
            SI VOUS AVEZ DÉJÀ UN COMPTE
            </button>
          </a>
        </section>


        
<section class="errors">

<!--Alerte (erreur ou succès)-->
<?php if (!empty($errors)): ?>
    <div class="error">
        <?php foreach ($errors as $error) :?>
            <p><?= $error?></p>
        <?php endforeach;?>
    </div>
<?php elseif (isset($success)): ?>
    <div class="error">
        <p><?= $success ?></p>
    </div>
<?php endif; ?>

</section>
 
</main>

<?php include '../includes/footer.php'; ?>