<?php
    include ('header.php');

    $id_perso = $_GET['id_perso']??null;
    $add_movie = $_GET['add_film']??null; // nom du film entrée dans le <form>

    $return_member = get_member_by_id_perso($id_perso);

    if (!empty($add_movie)) {
        $film = get_film_by_name($add_movie);
        if ($film) { // si un film est trouvé
            add_movie_history($return_member['id_membre'], $film['id_film']);
        } else {
            alert('Pas de film trouvé');
        }
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

<?php
    if(empty($id_perso)){
        echo "ERROR - Il faut l'identitfiant d'un membre";
    } elseif(empty($return_member)) {
        echo "ERROR - Il faut un membre valide";
    } else {
?>
      <p>
           Nom - Prénom : <?= $return_member['nom'] . " - " . $return_member['prenom'];?>
          <br>
          <?php foreach ($return_historique as $value){

             echo 'Titre du film : ' . $value['titre'];
       } ?>
      </p>
<?php
    }
?>


<?php
    include ('footer.php');
?>
