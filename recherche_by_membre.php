<?php
    require ("header.php");

    $page = $_GET['page'] ?? 1 ;

    $return_membre = get_membre($page);
    $return_pagination = pagination_membre();

?>

<div class="container col-md-12">
    <form class="form col-md-6">
        <div class="col-md-6">
            <label for="recherche">
                Recherche par prénom
            </label>
            <input type="text" name="recherche" id="recherche" placeholder="armand" required>

            <label for="recherche">
                Recherche par nom
            </label>
            <input type="text" name="recherche" id="recherche" placeholder="de-ferrieres-de-sauveboeuf" required>

            <label for="recherche">
                Recherche par ville
            </label>
            <input type="text" name="recherche" id="recherche" placeholder="Lyon" required>

            <label for="recherche">
                Recherche par code postale
            </label>
            <input type="number" name="recherche" id="recherche" placeholder="69003" required>
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
                            <?= $value['nom'] ." ".$value['prenom'] ;?>

                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted"></h6>
                        <p class="card-text"> <?= "Ville : ".$value['ville'];?> </p>
                        <p class="card-text"> <?= "Code postale : ".$value['cpostal'];?> </p>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="row">
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédent</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Suivant</a>
                </li>
            </ul>
        </nav>
    </div>
</div>

<?php
    require ("footer.php");
?>