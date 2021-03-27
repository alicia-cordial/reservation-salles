<?php
$titre = 'update';
require_once '../classes/user.php';
require_once '../classes/validator.php';
session_start();
if (!(isset($_SESSION['user']))) {
    header('location:connexion.php');
}

if (isset($_POST['formprofil'])) {

    $validator = new validator();
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);

    if ($validator->userExists($login) == 1) {
        if ($validator->sameLogin($login, $_SESSION['user']->getLogin()) == 1) {
            $errors[] = "Ce login est déjà pris.";
        }
    }
    if ($validator->passwordConfirm($password, $password2) == 0) {
        $errors[] = "Les deux mots de passe ne sont pas identiques.";
    }
    if ($validator->passwordStrenght($password) == 0) {
        $errors[] = "Le mot de passe doit comporter au moins un chiffre.";
    }

    if (empty($errors)) {
        $_SESSION['user']->update($login, $password);
        $success = "Votre compte a bien été modifié. <a href='level.php'>Tirer les cartes</a>";
    }

}

?>

<?php include '../includes/header.php'; ?>

<main>

        <h1>Modifiez vos identifiants</h1>


        <!--Formulaire-->
        <form action="update.php" method="post">
       
                <div>
                    <input placeholder="login" id="login" type="text" name="login" maxlength="20"/>
                    <label for="login">New Login</label>
                </div>
       
          
                <div>
                    <input id="password" type="password" name="password" maxlength="20"/>
                    <label for="password">Nouveau Password</label>
                </div>
        
           
                <div>
                    <input id="password2" type="password" name="password2" maxlength="20"/>
                    <label for="password2">Confirmation Password</label>
                </div>
        
            <button type="submit" name="formprofil">Submit
             
            </button>

        </form>

        <section class="bouton">
          <a href="deconnexion.php">
            <button>
              SE DECONNECTER
            </button>
          </a>
        </section>

   
        <section class="errors">
            <!--Alerte (erreur ou succès)-->
            <?php if (!empty($errors)): ?>
                <div class="error">
                    <?php foreach ($errors as $error) : ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php elseif (isset($success)): ?>
                <div class="error">
                    <p><?php echo $success; ?></p>
                </div>
            <?php endif; ?>
        </section>


</main>

<?php include '../includes/footer.php'; ?>