<?php
    require ("header.php");

    $page = $_GET['page'] ?? 1;
    $nom_salle = $_GET['recherche_nom_salle'] ?? null;
    $num_etage = $_GET['etage_salle'] ?? null;
    $nbr_siege = $_GET['nbr_siege'] ?? null;

    $return_salle = get_salle($page,$nom_salle,$num_etage,$nbr_siege);

    $return_select_etage = select_etage();
    $return_nbr_siege = select_siege();

?>

<div class="container px-3 py-3">
    <form class="form col-md-6">

        <div class="col-md-6">
            <label for="recherche">
                Recherche d'une salle
            </label>

            <input type="text" name="recherche_nom_salle" id="recherche" placeholder="Montana">
        </div>
        <div class="form-group">
            <label for="select_etage">Numéro étage</label>
            <select name="etage_salle" class="form-control" id="select_etage">
                <option value="">Select numéro étage</option>
                <?php foreach ($return_select_etage as $value){ ?>
                    <option ><?= $value['etage_salle'];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nbr_siege">Nombre de siège</label>
            <select name="nbr_siege" class="form-control" id="nbr_siege">
                <option value="">Select nombre siège</option>
                <?php foreach ($return_nbr_siege as $value){ ?>
                    <option ><?= $value['nbr_siege'];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-6">
            <input class = "button" type="submit" value="Rechercher">
        </div>
    </form>
</div>

<div class="container px-3 py-3">
    <div class="row">
        <?php foreach ($return_salle as $value){ ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title nom_salle">
                            <?= $value['nom_salle'];?>
                        </h5>
                        <p class="card-text salle_etage"> <?= "Etage salle : ".$value['etage_salle']; ?> </p>
                        <p class="card-text salle_siege"> <?= "Nombre de siège : ".$value['nbr_siege']; ?> </p>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="row">
        <?php pagination_salle($page, $nom_salle,$num_etage,$nbr_siege); ?>
    </div>

    <div >
        <ul>
            <li><a href="programme.php">
                    Voir les programmes
                </a>
            </li>
        </ul>
    </div>
</div>



<?php
    require("footer.php");
?>