<?php
    require ("header.php");

    $page = $_GET['page'] ?? 1 ;
    $membre_nom = $_GET['recherche_par_nom']??null;
    $membre_prenom = $_GET['recherche_par_prenom']??null;
    $membre_ville = $_GET['recherche_par_ville']??null;
    $membre_cp = $_GET['recherche_par_cp']??null;

    $return_membre = get_membre($page,$membre_nom,$membre_prenom,$membre_ville,$membre_cp);

?>

<div class="container px-3 py-3">
    <form class="form col-md-6" method="get">
        <div class="col-md-6">
            <label for="recherche_par_prenom">
                Recherche par prénom
            </label>
            <input type="text" id="recherche_par_prenom" name="recherche_par_prenom" placeholder="armand">

            <label for="recherche_par_nom">
                Recherche par nom
            </label>
            <input type="text" id="recherche_par_nom" name="recherche_par_nom" placeholder="de-ferrieres-de-sauveboeuf">

            <label for="recherche_par_ville">
                Recherche par ville
            </label>
            <input type="text" id="recherche_par_ville" name="recherche_par_ville" placeholder="Lyon">

            <label for="recherche_par_cp">
                Recherche par code postale
            </label>
            <input type="text" id="recherche_par_cp" name="recherche_par_cp" placeholder="69003">
        </div>

        <div class="col-md-6">
            <input class = "button" type="submit" value="Rechercher">
        </div>
    </form>
</div>


<div class="container px-3 py-3">
    <div class="row">
        <?php foreach ($return_membre as $value){ ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title membre_nom">
                            <?= "Nom : ".$value['nom'] ;?>
                            <br>
                            <?= "Prénom : ".$value['prenom'] ;?>
                        </h5>
                        <p class="card-text membre_vile"> <?= "Ville : ".$value['ville'];?> </p>
                        <p class="card-text membre_cp"> <?= "Code postale : ".$value['cpostal'];?> </p>

                        <?php
                        if ($value['id_abonnement'] != 0){
                            ?>
                            <p class="membre_abo"> <?= "Abonnement : ".$value['nom_abo'];?> </p>
                            <?php
                        } else { ?>
                            <p class="membre_abo"> <?= "Abonnement : Aucun";?> </p> <?php

                        } ?>


                        <br>
                        <p class = "text-hidden historique">
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