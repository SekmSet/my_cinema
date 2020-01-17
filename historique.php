<?php
    include ('header.php');

    $id_perso = $_GET['id_perso']??null;
    //$nom_abo = $_GET['name_abo']??null;
    $add_movie = $_GET['add_film']??null; // nom du film entrée dans le <form>

    // gestion abo
    $type = $_GET['type']??null;
    $abo_selected = $_GET['abonnement'] ??null;

    $return_member = get_member_by_id_perso($id_perso);
    $id_abo = $return_member['id_abo'];


    $return_abonnements = get_abonnements();

    if (!empty($add_movie)) {
        $film = get_film_by_name($add_movie);
        if ($film) { // si un film est trouvé
            add_movie_history($return_member['id_membre'], $film['id_film']);
        } else {
            alert('Pas de film trouvé');
        }
    }

    if ($type === 'update_abo') {
        $abo_selected = (int) $abo_selected;
        change_abonnement($abo_selected, $id_perso);
        $id_abo=$abo_selected;

    } else if ($type === 'delete_abo') {
        change_abonnement(0, $id_perso);
        $id_abo=0;
    }

    $return_historique = historic_member($id_perso);
?>


<div class="container col-md-12">
    <form class="form col-md-11" method="get">
        <div class="col-md-5">
            <div class="form-group">
                <label for="year_first_affiche">Titre du film que vous souhaitez ajouter à votre historique : </label>
                <input type="text" name="add_film" id="recherche" placeholder="A Night at the Roxbury" >
                <input type="hidden" name="id_perso" value="<?= $id_perso?>">
            </div>
            <div class="col-md-4">
                <input type="submit" name="add" value="Ajouter">
            </div>
        </div>
    </form>
</div>
<div class="container">
    <div class="col-md-6">
        <?php
            if(empty($id_perso)){
                echo "ERROR - Il faut l'identitfiant d'un membre";
            } elseif(empty($return_member)) {
                echo "ERROR - Il faut un membre valide";
            } else {
        ?>
              <p>
                   <b> Nom - Prénom : <?= $return_member['nom_membre'] . " - " . $return_member['prenom'];?> </b>
                  <br>
              </p>

            <div class="list-group">
               <?php foreach ($return_historique as $value){?>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">

                            <?= 'Titre du film : ' . $value['titre'];?>
                            <br>
                            <?= 'Vu le : ' . $value['date_dernier_film'];?>

                    </li>
                </ul>
               <?php } ?>
            </div>
        <?php
        }
        ?>
    </div>
</div>



<div class="container">
    <div class = "col-md-12">
        <div class="col-md-6">
            <?php
            if (!empty($id_abo)){
                ?>
                <form action="">
                    <label for="abonnement">Abonnement: </label>
                    <select id="abonnement" name="abonnement">
                        <?php foreach ($return_abonnements as $value) { ?>
                            <option <?= print_selected($id_abo, (int)$value['id_abo']);?> value="<?= $value['id_abo']?>"><?= $value['nom'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="hidden" name="type" value="update_abo">
                    <input type="hidden" name="id_perso" value="<?= $id_perso ?>">
                    <input type="submit" value="Changer mon abonnement">
                </form>

                <form action="">
                    <input type="hidden" name="type" value="delete_abo">
                    <input type="hidden" name="id_perso" value="<?= $id_perso ?>">
                    <input type="submit" name="delete" value="Supprimer mon abonnement">
                </form>

                <?php
            } else { ?>
                <p> <?= "Abonnement : Aucun";?> </p>
                <form action="">
                    <label for="abonnement">Abonnement: </label>
                    <select id="abonnement" name="abonnement">
                        <option value="0">Choix de l'abonnement</option>
                        <?php foreach ($return_abonnements as $value) { ?>
                            <option value="<?= $value['id_abo']?>"><?= $value['nom'] ?></option>
                        <?php } ?>
                    </select>
                    <input type="hidden" name="type" value="update_abo">
                    <input type="hidden" name="id_perso" value="<?= $id_perso ?>">
                    <input type="submit" name="subscribe" value="Souscrire à un abonnement">
                </form>
                <?php
            } ?>

            <ul>
                <li><a href="abonnement.php">
                        Vous souhaitez voir les différents abonnement ?
                    </a></li>
            </ul>
        </div>
    </div>
</div>
</div>


<?php
    include ('footer.php');
?>
