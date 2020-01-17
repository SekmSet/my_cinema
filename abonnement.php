<?php
    require ("header.php");

    $return_abonnement = get_abonnements();
?>

<div class="container col-md-12">
    <form class="form col-md-6">

        <div class="col-md-6">
            <label for="recherche">
                Recherche
            </label>
            <input type="text" name="recherche" id="recherche" placeholder="Gold" required>
        </div>

        <div class="col-md-6">
            <input type="submit" value="Rechercher">
        </div>
    </form>
</div>

<div class="container">
    <?php foreach ($return_abonnement as $value){ ?>
    <div class="card-deck mb-3 text-center">
        <div class="card mb-3 shadow-sm">
            <div class="card-header">
                <h4 class="my-0 font-weight-normal">   <?= $value['nom'];?>  </h4>
            </div>

            <div class="card-body">
                <h1 class="card-title pricing-card-title">
                <?= "Prix : ".$value['prix']."€"; ?>
                    <small class="text-muted">
                        <p class="card-text"> <?= "Durée (en jour) : ".$value['duree_abo']; ?>
                    </small>
                </h1>
                <ul class="list-unstyled mt-3 mb-4">
                    <li> <p class="card-text"> <?= PHP_EOL.$value['resum']; ?> </p></li>
                </ul>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<br>


<div class="container">
    <?php
    require("footer.php");
    ?>
</div>
