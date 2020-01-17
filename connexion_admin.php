<?php
    include ('header.php');
?>

<div class="container col-md-3">
    <form class="form-signin">
        <h1 class="h3 mb-3 font-weight-normal">Connexion Admin</h1>
        <label for="inputEmail" class="sr-only">ID Admin</label>
        <input type="text" id="id_admin" class="form-control" placeholder="Admin_1" required autofocus>
        <label for="inputPassword" class="sr-only">Mot de passe</label>
        <input type="password" id="password" class="form-control" placeholder="****" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Connexion</button>
    </form>
</div>


<?php
    require ("footer.php");
?>