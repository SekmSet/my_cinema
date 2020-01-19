<?php
    require ("header.php");

    $page = $_GET['page'] ?? 1;

    $recherche_titre = $_GET['recherche']??null;
    $genre_selected = $_GET['gender_type']??null;
    $distrib_select = $_GET['name_distrib']??null;
    $annee_affiche_deb_select = $_GET['deb_affiche']??null;
    $annee_affiche_fin_select = $_GET['fin_affiche']??null;
    $annee_prod_select = $_GET['year_prod']??null;

    $return_films = get_films($page,$recherche_titre,$genre_selected,$distrib_select,$annee_affiche_deb_select,
                                $annee_affiche_fin_select,$annee_prod_select);

    $return_select_genre = select_genre();
    $return_select_distrib = select_distrib();
    $return_select_fin_affiche = select_film_fin_affiche();
    $return_select_debut_affiche = select_film_debut_affiche();
    $return_select_annee_prod =  select_film_annee_prod();

?>

<div class="container px-3 py-3">
    <form class="form col-md-6" method="get">
        <div class="col-md-6">
            <label for="recherche">
                Recherche par titre
            </label>
            <input type="text" name="recherche" id="recherche" placeholder="A Night at the Roxbury" >
        </div>

        <div class="form-group">
            <label for="select_gender">Genre</label>
            <select name="gender_type" class="form-control" id="select_gender">
                <option value="">Select genre</option>
                <?php foreach ($return_select_genre as $value){ ?>
                    <option <?= print_selected($genre_selected,$value['nom']);?> ><?= $value['nom'];?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="select_distrib">Distributeur</label>
            <select name="name_distrib" class="form-control" id="select_distrib">
                <option value="">Select distributeur</option>
                <?php foreach ($return_select_distrib as $value){ ?>
                    <option <?= print_selected($distrib_select,$value['nom']);?>><?= $value['nom'];?></option>
                <?php } ?>
            </select>
        </div>

        <br>

        <div class="form-group">
            <label for="year_first_affiche">Année début d'affichage</label>
            <select name="deb_affiche" class="form-control" id="year_first_affiche">
                <option value="">Select année début affichage</option>
                <?php foreach ($return_select_debut_affiche as $value){ ?>
                    <option <?= print_selected($annee_affiche_deb_select,$value['year(date_debut_affiche)']);?>> <?= $value['year(date_debut_affiche)'];?> </option>
                <?php } ?>
            </select>
        </div>

        <br>

        <div class="form-group">
            <label for="year_last_affiche">Année fin d'affichage</label>
            <select name="fin_affiche" class="form-control" id="year_last_affiche">
                <option value="">Select année fin affichage</option>
                <?php foreach ($return_select_fin_affiche as $value){ ?>
                    <option <?= print_selected($annee_affiche_fin_select,$value['year(date_fin_affiche)']);?>><?= $value['year(date_fin_affiche)'];?></option>
                <?php } ?>
            </select>
        </div>

        <br>

        <div class="form-group">
            <label for="year_annee_prod">Année de production</label>
            <select name="year_prod" class="form-control" id="year_annee_prod">
                <option value="">Select année de production</option>
                <?php foreach ($return_select_annee_prod as $value){ ?>
                    <option <?= print_selected($annee_prod_select,$value['annee_prod']);?>><?= $value['annee_prod'];?></option>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-6">
            <input class = "button" type="submit" name="submit" value="Rechercher">
        </div>
    </form>
</div>

<div class="container px-3 py-3">
    <div class="row">
    <?php foreach ($return_films as $value){ ?>
        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title nom_film">
                        <?= $value['titre'] ;?>
                        <br>
                        <?=$value['duree_min']."min"; ?>
                    </h5>
                    <h6 class="card-subtitle mb-2 text-muted"></h6>

                    <p class="card-text resum_film"> <?= $value['resum']; ?> </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <ol>
                                <li id="genre_film"> Genre :  <?= $value['nom_genre']; ?></li>
                                <li id="distrib_film"> Distributeur :  <?= $value['nom_distrib']; ?></li>
                            </ol>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>

    <div class="row">
        <?php pagination_films($page, $recherche_titre, $genre_selected, $distrib_select, $annee_affiche_deb_select, $annee_affiche_fin_select, $annee_prod_select); ?>
    </div>

    <hr>
</div>



<?php
 require ("footer.php");
?>