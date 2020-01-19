<?php
    include ('header.php');

    $id_perso = $_GET['id_perso']??null;
    //$nom_abo = $_GET['name_abo']??null;
    $add_movie = $_GET['add_film']??null; // nom du film entrée dans le <form>

    // gestion abo
    $type = $_GET['type']??null;
    $abo_selected = $_GET['abonnement'] ??null;

    $avis_film = $_GET['avis'] ??null;
    $date_film = $_GET['date'] ??null;
    $id_film = $_GET['id_film'] ??null;


    $return_member = get_member_by_id_perso($id_perso);
    $id_abo = $return_member['id_abo'];


    $return_abonnements = get_abonnements();

    if (!empty($add_movie)) {
        $film = get_film_by_name($add_movie);
        if ($film) { // si un film est trouvé
            add_movie_history($return_member['id_membre'], $film['id_film'], $avis_film);
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
    } else if ($type === 'Donner mon avis') {
        update_avis($return_member['id_membre'], $id_film, $date_film ,$avis_film);
    }

    $return_historique = historic_member($id_perso);
?>


<div class="container px-3 py-3">
    <form class="form col-md-11" method="get">
        <div class="col-md-5">
            <div class="form-group">
                <label for="year_first_affiche">Titre du film que vous souhaitez ajouter à votre historique : </label>
                <input type="text" name="add_film" id="year_first_affiche" placeholder="A Night at the Roxbury" required>
                <input type="hidden" name="id_perso" value="<?= $id_perso?>">
            </div>
            <div>
                <label for="add_avis">Ajouter un avis au film ? :</label>
                <textarea id="add_avis" name="avis" rows="5" cols="33" placeholder="Ceci est mon avis"></textarea>
            </div>
            <div class="col-md-4">
                <input type="submit" name="add" value="Ajouter">
            </div>
        </div>
    </form>
</div>
<div class="container px-3 py-3">
    <div class="col-md-6">
        <?php
            if(empty($id_perso)){
                echo "ERROR - Il faut l'identitfiant d'un membre";
            } elseif(empty($return_member)) {
                echo "ERROR - Il faut un membre valide";
            } else {
        ?>
              <p class="nom_prenom">
                   <b> Nom - Prénom : <?= $return_member['nom_membre'] . " - " . $return_member['prenom'];?> </b>
                  <br>
              </p>

            <div class="list-group">
               <?php foreach ($return_historique as $value){?>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <br>
                        <p class="titre_film"> <?= 'Titre du film : ' . $value['titre'];?></p>
                        <p class="date_vu"><?= 'Vu le : ' . $value['date'];?></p>
                        <p class="avis_film"> <?= 'Votre avis : ' . $value['avis'];?></p>

                        <form>
                            <textarea name="avis" class="avis_my_movie" cols="22" rows="2" placeholder="Ajouter un avis"></textarea>
                            <input type="hidden" name="id_perso" value="<?= $id_perso?>">
                            <input type="hidden" name="date" value="<?= $value['date'] ?>">
                            <input type="hidden" name="id_film" value="<?= $value['id_film'] ?>">

                            <input class="button" type="submit" name="type" value="Donner mon avis">
                        </form>
                    </li>
                </ul>
               <?php } ?>
            </div>
        <?php
        }
        ?>
    </div>
</div>



<div class="container px-3 py-3">
    <div class = "col-md-12">
        <div class="col-md-6">
            <?php
            if (!empty($id_abo)){
                ?>
                <form>
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

                <form>
                    <input type="hidden" name="type" value="delete_abo">
                    <input type="hidden" name="id_perso" value="<?= $id_perso ?>">
                    <input type="submit" name="delete" value="Supprimer mon abonnement">
                </form>

                <?php
            } else { ?>
                <p> <?= "Abonnement : Aucun";?> </p>
                <form>
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
                <li>
                    <a href="abonnement.php">Vous souhaitez voir les différents abonnements ?</a>
                </li>
            </ul>
        </div>
    </div>
</div>


<?php
    include ('footer.php');
?>
