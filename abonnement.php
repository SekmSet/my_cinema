<?php
    require ("header.php");

    $return_abonnement = get_abonnements();
?>

<div class="container px-3 py-3">
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

<div class="container px-3 py-3">
    <div class="row">
        <?php foreach ($return_abonnement as $value){ ?>
            <div class="card-deck mb-3 text-center col-md-6">
                <div class="card mb-3 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">   <?= $value['nom'];?>  </h4>
                    </div>

                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">
                            <?= "Prix : ".$value['prix']."€"; ?><br>
                            <small class="card-text text-muted">
                                <?= "Durée (en jour) : ".$value['duree_abo']; ?>
                            </small>
                        </h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li><p class="card-text"> <?= PHP_EOL.$value['resum']; ?> </p></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


<?php
require ("footer.php");
?>
