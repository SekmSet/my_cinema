<?php
    include ('header.php');
?>

<div class="container col-md-12">
    <form class="form col-md-6">
        <div class="col-md-6">
            <label for="user">
                Utilisateur
            </label>
            <input type="text" name="user" id="user" placeholder="User_1" required>
        </div>

        <div class="col-md-6">
            <label for="user">
                Mot de passe
            </label>
            <input type="password" name="pwd" id="pwd" placeholder="*******" required>
        </div>

        <div class="col-md-6">
            <input type="submit" value="Connexion!">
        </div>
    </form>
</div>
<?php
    require ("footer.php");
?>