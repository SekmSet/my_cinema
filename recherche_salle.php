<?php
    require ("header.php");

    $page = $_GET['page'] ?? 1;

    $return_salle = get_salle($page);

    $return_pagination = pagination_salle();
?>

<div class="container col-md-12">
    <form class="form col-md-6">

        <div class="col-md-6">
            <label for="recherche">
                Recherche d'une salle
            </label>

            <input type="text" name="recherche" id="recherche" placeholder="Montana" required>
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
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

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