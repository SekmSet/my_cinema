<?php
    require ("header.php");

    $page = $_GET['page'] ?? 1 ;
    $membre_nom = $_GET['recherche_par_nom']??null;
    $membre_prenom = $_GET['recherche_par_prenom']??null;
    $membre_ville = $_GET['recherche_par_ville']??null;
    $membre_cp = $_GET['recherche_par_cp']??null;

    $return_membre = get_membre($page,$membre_nom,$membre_prenom,$membre_ville,$membre_cp);

?>

<div class="container col-md-12">
    <form class="form col-md-6" method="get">
        <div class="col-md-6">
            <label for="recherche">
                Recherche par prénom
            </label>
            <input type="text" name="recherche_par_prenom" id="recherche" placeholder="armand">

            <label for="recherche">
                Recherche par nom
            </label>
            <input type="text" name="recherche_par_nom" id="recherche" placeholder="de-ferrieres-de-sauveboeuf">

            <label for="recherche">
                Recherche par ville
            </label>
            <input type="text" name="recherche_par_ville" id="recherche" placeholder="Lyon">

            <label for="recherche">
                Recherche par code postale
            </label>
            <input type="text" name="recherche_par_cp" id="recherche" placeholder="69003">
        </div>

        <div class="col-md-6">
            <input type="submit" value="Rechercher">
        </div>
    </form>
</div>


<div class="container">
    <div class="row">
        <?php foreach ($return_membre as $value){ ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= "Nom : ".$value['nom'] ;?>
                            <br>
                            <?= "Prénom : ".$value['prenom'] ;?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <p class="card-text"> <?= "Ville : ".$value['ville'];?> </p>
                        <p class="card-text"> <?= "Code postale : ".$value['cpostal'];?> </p>

                        <?php
                        if ($value['id_abonnement'] != 0){
                            ?>
                            <p> <?= "Abonnement : ".$value['nom_abo'];?> </p>
                            <?php
                        } else { ?>
                            <p> <?= "Abonnement : Aucun";?> </p> <?php

                        } ?>


                        <br>
                        <p class = "text-hidden">
                            <!-- on ajoute des get nom abo -->
                            <a href="historique.php?id_perso=<?= $value['id_perso']?>"> Voir l'historique </a>
                        </p>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="row">
        <?php pagination_membre($page,$membre_nom,$membre_prenom,$membre_ville,$membre_cp); ?>
    </div>

    <hr>

</div>

<?php
    require ("footer.php");
?>