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

<div class="container col-md-12">
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
                <option>Select numéro étage</option>
                <?php foreach ($return_select_etage as $value){ ?>
                    <option ><?= $value['etage_salle'];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nbr_siege">Nombre de siège</label>
            <select name="nbr_siege" class="form-control" id="select_etage">
                <option>Select nombre siège</option>
                <?php foreach ($return_nbr_siege as $value){ ?>
                    <option ><?= $value['nbr_siege'];?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-md-6">
            <input type="submit" value="Rechercher">
        </div>
    </form>
</div>

<div class="container">
    <div class="row">
        <?php foreach ($return_salle as $value){ ?>
            <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            <?= $value['nom_salle'];?>
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <p class="card-text"> <?= "Etage salle : ".$value['etage_salle']; ?> </p>
                        <p class="card-text"> <?= "Nombre de siège : ".$value['nbr_siege']; ?> </p>

                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="row">
        <?php pagination_salle($page, $nom_salle,$num_etage,$nbr_siege); ?>
    </div>

    <hr>

    <div class="container">
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