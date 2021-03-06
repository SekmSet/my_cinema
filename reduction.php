<?php
    require ("header.php");

    $return_reduction = get_reduction();
?>

<div class="container px-3 py-3">
    <form class="form col-md-6">

        <div class="col-md-6">
            <label for="recherche">
                Recherche
            </label>
            <input type="text" name="recherche" id="recherche" placeholder="jeune" required>
        </div>

        <div class="col-md-6">
            <input type="submit" value="Rechercher">
        </div>
    </form>
</div>

<div class="container px-3 py-3">
    <div class="row">
        <?php foreach ($return_reduction as $value){ ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= "Réduction : ".$value['nom'];?>
                        </h5>
                        <p class="card-text"> <?= "Description : ".$value['pourcentage_reduc'] ."%"; ?> </p>
                        <?php
                        if ($value['nom'] === "fete de la musique"){
                            ?>
                            <p>
                                <?= "Date de début : ".$value['date_debut']; ?>
                            </p>
                            <p>
                                <?= "Date de fin : ".$value['date_fin']; ?>
                            </p>
                        <?php } ?>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

<?php
    require("footer.php");
?>