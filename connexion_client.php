<?php
    include ('header.php');
?>

    <div class="container px-3 py-3">
        <form class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal">Connexion Utilisateur</h1>
            <label for="inputEmail" class="sr-only">ID Utilisateur</label>
            <input type="text" id="inputEmail" class="form-control" placeholder="User_1" required autofocus>
            <label for="inputPassword" class="sr-only">Mot de passe</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="****" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
        </form>
    </div>
<?php
    require ("footer.php");
?>