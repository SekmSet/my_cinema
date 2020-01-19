<?php
    include ('header.php');

    $verif_email = $_POST['inputEmail']?? null;
    $verif_mdp = $_POST['pwd']?? null;

    $return_verif = connexion_client($verif_email,$verif_mdp);

    if($return_verif !== FALSE){
        $_SESSION['client'] = $return_verif;

        // redirige sur l'accueil
        echo '<script>window.location.href = "index.php";</script>';
    }
?>

    <div class="container px-3 py-3">
        <form class="form-signin" method="post">
            <h1 class="h3 mb-3 font-weight-normal">Connexion Utilisateur</h1>
            <label for="inputEmail" class="sr-only">ID Utilisateur</label>
            <input type="text" id="inputEmail" name="inputEmail" class="form-control" placeholder="User_1" required autofocus>
            <label for="inputPassword" class="sr-only">Mot de passe</label>
            <input type="password"  name="pwd" id="inputPassword" class="form-control" placeholder="****" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
        </form>
    </div>

<?php
    require ("footer.php");
?>