<?php
/** GESTION DES ABONNEMENTS AJOUT / MODIFICATION / SUPPRIMER **/


function change_abonnement($id_new_abo,$id_perso){
    $recup_var = connect_sql();
    $change_abonnement = "update membre set id_abo = $id_new_abo where id_fiche_perso = $id_perso;";
    $results_modif_abo = $recup_var->exec($change_abonnement);

    return $results_modif_abo === 1;
}


/** GESTION DES HISTORIQUES **/

function historic_member($id_perso){
    if($id_perso === null || !is_numeric($id_perso)){
        return [];
    }

    $recup_var = connect_sql();
    $show_histo = "select *  from membre
        left join historique_membre on membre.id_membre = historique_membre.id_membre
        left join film  on historique_membre.id_film = film.id_film
        where membre.id_fiche_perso = $id_perso;";

    $results_histo = $recup_var->query($show_histo, PDO::FETCH_ASSOC);

    return $results_histo->fetchAll();
}

function get_member_by_id_perso($id_perso){
    if($id_perso === null || !is_numeric($id_perso)){
        return [];
    }

    $recup_var = connect_sql();
    $show_name = "select *, fiche_personne.nom as nom_membre from membre
        left join fiche_personne
            on membre.id_fiche_perso = fiche_personne.id_perso
        left join abonnement on membre.id_abo = abonnement.id_abo
        where membre.id_fiche_perso = $id_perso;";

    $results_name = $recup_var->query($show_name, PDO::FETCH_ASSOC);

    return $results_name->fetch();
}

/** FONCTIONS POUR LES AVIS **/

function update_avis($id_membre,$id_film,$date,$avis){
    $recup_var = connect_sql();

    $update_table = "update historique_membre set avis = '$avis' where id_membre = $id_membre and id_film = $id_film and date = '$date' ;";
    $recup_var->exec($update_table);
}


/** FONCTIONS POUR LES AFFICHAGES & LES FILTRAGES **/

function get_reduction(){

    $recup_var = connect_sql();

    $show_reduction = "select * from reduction;";
    $results_reduction = $recup_var->query($show_reduction, PDO::FETCH_ASSOC);

    return $results_reduction->fetchAll();
}

function get_abonnements(){

    $recup_var = connect_sql();

    $show_abonnement = 'select * from abonnement;';
    $results_abonnement = $recup_var->query($show_abonnement, PDO::FETCH_ASSOC);

    return $results_abonnement->fetchAll() ;
}

function get_membre($page,$membre_nom,$membre_prenom,$membre_ville,$membre_cp){

    $recup_var = connect_sql();

    $membre_par_page = 12;
    $start = ($page-1)*$membre_par_page;

    $where = [];

    if(!empty($membre_prenom)){
        $where[] = "prenom = '$membre_prenom'";
    }
    if(!empty($membre_nom)){
        $where[] = "nom like '$membre_nom%'";
    }
    if(!empty($membre_ville)){ //
        $where[] = "ville like '$membre_ville%'";
    }
    if(!empty($membre_cp)){
        $where[] = "cpostal = '$membre_cp'"; // quand where qqc = qqc pas de %
    }

    $where_to_string = implode(' and ',$where);

    if(!empty($where_to_string)){
        $show_membre = "select fiche_personne.nom,.fiche_personne.prenom,fiche_personne.cpostal,fiche_personne.ville,fiche_personne.id_perso, membre.id_abo as '[id_abonnement]', abonnement.nom as 'nom_abo'
                            from membre 
                            inner join fiche_personne on membre.id_fiche_perso  = fiche_personne.id_perso
                            left join abonnement on membre.id_abo = abonnement.id_abo 
                            where 
                                $where_to_string
                            limit $start ,$membre_par_page;";
    } else {
        $show_membre = "select fiche_personne.nom,fiche_personne.prenom,fiche_personne.cpostal,fiche_personne.ville,fiche_personne.id_perso, membre.id_abo as 'id_abonnement', abonnement.nom as 'nom_abo'
                            from membre 
                            inner join fiche_personne on membre.id_fiche_perso  = fiche_personne.id_perso
                            left join abonnement on membre.id_abo = abonnement.id_abo 
                            limit $start ,$membre_par_page;";
    }
    $results_membre = $recup_var->query($show_membre, PDO::FETCH_ASSOC);

    return $results_membre->fetchAll();
}

function get_films($page, $recherche_titre, $genre_selected, $distrib_select, $annee_affiche_deb_select, $annee_affiche_fin_select, $annee_prod_select){

    $recup_var = connect_sql();

    $film_par_page = 16;
    $start = ($page-1) * $film_par_page;

    $where = [];
    if(!empty($recherche_titre)) {
        $where[] = "titre like '$recherche_titre%'";
    }
    if(!empty($annee_affiche_deb_select)) {
        $where[] =  "year(date_debut_affiche) = '$annee_affiche_deb_select'";
    }
    if(!empty($annee_affiche_fin_select)) {
        $where[] =  "year(date_fin_affiche) = '$annee_affiche_fin_select'";
    }
    if(!empty($annee_prod_select)) {
        $where[] = "annee_prod = '$annee_prod_select'";
    }

    if(!empty($distrib_select)){
        $where[] = "distrib.nom = '$distrib_select'";
    }

    if(!empty($genre_selected)){
        $where[] = "genre.nom = '$genre_selected'";
    }

    $where_string = implode(' and ', $where); //  titre like '$recherche_titre%' and year(date_fin_affiche) = '$annee_affiche_fin_select'

    if(!empty($where_string)) {
        $show_film = "select titre,resum,duree_min, genre.nom as 'nom_genre', distrib.nom as 'nom_distrib'
                        from film
                        left join genre on film.id_genre = genre.id_genre
                        left join distrib on film.id_distrib = distrib.id_distrib
                        where 
                              $where_string
                        limit $start,$film_par_page;";

    } else {
        $show_film = "select titre,resum,duree_min, genre.nom as 'nom_genre', distrib.nom as 'nom_distrib'
                        from film
                        left join genre on film.id_genre = genre.id_genre
                        left join distrib on film.id_distrib = distrib.id_distrib
                        limit $start,$film_par_page;";
    }

    $results_film = $recup_var->query($show_film, PDO::FETCH_ASSOC);

    return $results_film->fetchAll();
}

function get_film_by_name($name) {
    $recup_var = connect_sql();

    $show_titre_film = "select * from film where titre = '$name';";
    $film = $recup_var->query($show_titre_film, PDO::FETCH_ASSOC);
    return $film->fetch();
}

function add_movie_history($id_membre, $id_film, $avis_film){
    $recup_var = connect_sql();

    $date = 'NOW()';

    if(!empty($id_membre) && !empty($id_film) && is_numeric($id_membre) && is_numeric($id_film)){

        $show_add = "insert into historique_membre values ($id_membre,$id_film,$date, '$avis_film');";
        $recup_var->exec($show_add);
    }
}

function print_selected($var_url,$var_opt){
    if ($var_url === $var_opt) {
        return "selected";
    }
}

function print_active($page, $current_page){
    if ($page === $current_page) {
        return "active";
    }
}

function get_salle($page,$nom_salle,$num_etage,$nbr_siege){

    $recup_var = connect_sql();

    $salle_par_page = 6;
    $start = ($page-1)*$salle_par_page;

    $where = [];
    if(!empty($nom_salle)){
        $where[] = "nom_salle like '$nom_salle%'";
    }
    if(!empty($num_etage)){
        $where[] = "etage_salle = '$num_etage'";
    }
    if(!empty($nbr_siege)){
        $where[] = "nbr_siege = '$nbr_siege'";
    }

    $where_to_string = implode(' and ',$where);

    if(!empty($where_to_string)){
        $show_salle = "select nom_salle,numero_salle,etage_salle,nbr_siege from salle
                            where
                                  $where_to_string
                            limit $start,$salle_par_page;";
    } else {
        $show_salle = "select nom_salle,numero_salle,etage_salle,nbr_siege from salle
                            limit $start,$salle_par_page;";
    }

    $results_salle = $recup_var->query($show_salle, PDO::FETCH_ASSOC);
    return $results_salle->fetchAll();
}

/** FONCTIONS POUR LES LISTES DE SELECTION **/

function select_distrib(){

    $recup_var = connect_sql();

    $show_distrib = "select * from distrib order by nom asc;";

    $results_distrib = $recup_var->query($show_distrib, PDO::FETCH_ASSOC);
    return $results_distrib->fetchAll();
}

function select_genre(){

    $recup_var = connect_sql();
    $show_membre = "select * from genre order by nom asc;";
    $results_genre = $recup_var->query($show_membre, PDO::FETCH_ASSOC);

    return $results_genre->fetchAll();
}

function select_film_debut_affiche(){
    $recup_var = connect_sql();
    $select_debut_affiche = 'select year(date_debut_affiche) from film group by year(date_debut_affiche);';
    $results_debut = $recup_var->query($select_debut_affiche, PDO::FETCH_ASSOC);

    return $results_debut->fetchAll();
}

function select_film_fin_affiche(){
    $recup_var = connect_sql();
    $select_fin_affiche = 'select year(date_fin_affiche) from film group by  year(date_fin_affiche);';
    $results_fin = $recup_var->query($select_fin_affiche, PDO::FETCH_ASSOC);

    return $results_fin->fetchAll();
}

function select_film_annee_prod(){
    $recup_var = connect_sql();
    $select_annee_prod = 'select annee_prod from film group by annee_prod;';
    $results_prod = $recup_var->query($select_annee_prod, PDO::FETCH_ASSOC);
    return $results_prod->fetchAll();
}

function select_etage(){
    $recup_var = connect_sql();
    $num_etage = 'select etage_salle from salle group by etage_salle;';
    $results_etage = $recup_var->query($num_etage, PDO::FETCH_ASSOC);
    return $results_etage->fetchAll();
}

function select_siege(){
    $recup_var = connect_sql();
    $nbr_siege = 'select nbr_siege from salle group by nbr_siege;';
    $results_siege = $recup_var->query($nbr_siege, PDO::FETCH_ASSOC);
    return $results_siege->fetchAll();
}

/** FONCTIONS POUR LA PAGINATION **/

function pagination_film(){

    $recup_var = connect_sql();

    $count_film = "select count(*) as 'nbr_film' from film;";

    $results_film = $recup_var->query($count_film, PDO::FETCH_ASSOC);
    $nbr_film=$results_film->fetch()['nbr_film'];
    $film_par_page = 16;
    $nbr_page = $nbr_film/$film_par_page;

    for($i=1;$i<=$nbr_page;$i++){
        echo "<a href=\"http://localhost/W@C/Projet/my_cinema/recherche_by_film.php?page=$i\"> $i </a> \ ";
    }
}

function pagination_salle($page, $nom_salle,$num_etage,$nbr_siege){

    $recup_var = connect_sql();

    $where = [];
    if(!empty($nom_salle)){
        $where[] = "nom_salle like '$nom_salle%'";
    }
    if(!empty($num_etage)){
        $where[] = "etage_salle = '$num_etage'";
    }
    if(!empty($nbr_siege)){
        $where[] = "nbr_siege = '$nbr_siege'";
    }

    $where_to_string = implode(' and ',$where);

    if(!empty($where_to_string)){
        $show_salle = "select count(*) as 'nbr_salle' from salle where $where_to_string;";
    } else {
        $show_salle = "select count(*) as 'nbr_salle' from salle;";
    }

    $results_salle = $recup_var->query($show_salle, PDO::FETCH_ASSOC);
    $salle_number = $results_salle->fetch()['nbr_salle'];

    $salle_par_page = 6;
    $nbr_page = ceil($salle_number/$salle_par_page);

    echo '<nav><ul class="pagination">';
    for($i=1;$i<=$nbr_page;$i++){
        echo '<li class="page-item '. print_active((int)$page, $i).'"><a class="page-link" href="recherche_salle.php?page='.$i.'">'.$i.'</a></li>';
    }
    echo '</ul></nav>';
}

function pagination_membre($page,$membre_nom,$membre_prenom,$membre_ville,$membre_cp){

    $recup_var = connect_sql();

    $where = [];

    if(!empty($membre_prenom)){
        $where[] = "prenom = '$membre_prenom'";
    }
    if(!empty($membre_nom)){
        $where[] = "nom like '$membre_nom%'";
    }
    if(!empty($membre_ville)){ //
        $where[] = "ville like '$membre_ville%'";
    }
    if(!empty($membre_cp)){
        $where[] = "cpostal = '$membre_cp'"; // quand where qqc = qqc pas de %
    }

    $where_to_string = implode(' and ',$where);

    if(!empty($where_to_string)){
        $show_membre = "select count(*) as 'type_gender'
                            from membre 
                            inner join fiche_personne on membre.id_fiche_perso  = fiche_personne.id_perso
                            left join abonnement on membre.id_abo = abonnement.id_abo 
                            where $where_to_string;";
    } else {
        $show_membre = "select count(*) as 'type_gender' from membre 
                            inner join fiche_personne on membre.id_fiche_perso  = fiche_personne.id_perso
                            left join abonnement on membre.id_abo = abonnement.id_abo;";
    }

    $results_membre = $recup_var->query($show_membre, PDO::FETCH_ASSOC);

    $membre_number = $results_membre->fetch()['type_gender'];

    $membre_par_page = 12;
    $nbr_page = ceil($membre_number/$membre_par_page);

    echo '<nav><ul class="pagination">';
    for($i=1;$i<=$nbr_page;$i++){
        echo '<li class="page-item '. print_active((int)$page, $i).'"><a class="page-link" href="recherche_by_membre.php?page='.$i.'">'.$i.'</a></li>';
    }
    echo '</ul></nav>';
}
















/** GESTION DES MESSAGES D'ALERT **/
function alert($message) {
    echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
}

