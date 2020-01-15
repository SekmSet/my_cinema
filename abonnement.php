<?php
    require ("header.php");

    $return_abonnement = get_abonnement();
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
    <div class="row">
        <?php foreach ($return_abonnement as $value){ ?>
            <div class="col-md-6">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $value['nom'];?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <p class="card-text"> <?= "Prix : ".$value['prix']."€"; ?> </p>
                        <p class="card-text"> <?= "Durée (en jour) : ".$value['duree_abo']; ?> </p>
                        <p class="card-text"> <?= PHP_EOL.$value['resum']; ?> </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php
    require("footer.php");
?>