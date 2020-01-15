<?php

/** FONCTIONS POUR LES AFFICHAGES **/

function get_reduction(){

    $recup_var = connect_sql();

    $show_reduction = "select * from reduction;";
    $results_reduction = $recup_var->query($show_reduction, PDO::FETCH_ASSOC);

    return $results_reduction->fetchAll();
}

function get_abonnement(){

    $recup_var = connect_sql();

    $show_abonnement = 'select * from abonnement;';
    $results_abonnement = $recup_var->query($show_abonnement, PDO::FETCH_ASSOC);

    return $results_abonnement->fetchAll() ;
}

function get_membre($page){

    $recup_var = connect_sql();

    $start = ($page-1)*12;

    $show_membre = "select * from fiche_personne limit $start ,12;";

    $results_membre = $recup_var->query($show_membre, PDO::FETCH_ASSOC);
    return $results_membre->fetchAll();
}

function get_film($page,$recherche_titre,$genre_selected,$distrib_select,$annee_affiche_deb_select,$annee_affiche_fin_select,$annee_prod_select){

    $recup_var = connect_sql();
    $film_par_page = 16;
    $start = ($page-1) * $film_par_page;

    $where = [];
    if($recherche_titre !== null) {
        $where[] = "titre like '$recherche_titre%'";
    }
    if($annee_affiche_deb_select !== 'Select année début affichage') {
        $where[] =  "year(date_debut_affiche) = '$annee_affiche_deb_select'";
    }
    if($annee_affiche_fin_select !== 'Select année fin affichage') {
        $where[] =  "year(date_fin_affiche) = '$annee_affiche_fin_select'";
    }
    if($annee_prod_select !== 'Select année de production') {
        $where[] = "annee_prod = '$annee_prod_select'";
    }

    if($distrib_select !== 'Select distributeur'){
        $where[] = "distrib.nom = '$distrib_select'";
    }

    if($genre_selected !== 'Select genre'){
        $where[] = "genre.nom = '$genre_selected'";
    }

    $where_string = implode(' and ', $where); //  titre like '$recherche_titre%' and year(date_fin_affiche) = '$annee_affiche_fin_select'

    $show_film = "select titre,resum,duree_min, genre.nom as 'nom_genre', distrib.nom as 'nom_distrib'
                        from film
                        left join genre on film.id_genre = genre.id_genre
                        left join distrib on film.id_distrib = distrib.id_distrib
                        where 
                              $where_string
                        limit $start,$film_par_page;";

    $results_film = $recup_var->query($show_film, PDO::FETCH_ASSOC);
    return $results_film->fetchAll();
}

function print_selected($var_url,$var_opt){

    if ($var_url === $var_opt) {
        return "selected";
    }
}

function get_salle($page){

    $recup_var = connect_sql();

    $salle_par_page = 6;
    $start = ($page-1)*$salle_par_page;

    $show_salle = "select * from salle limit $start,$salle_par_page;";

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

function pagination_membre(){

    $recup_var = connect_sql();

    $count_membre = "select count(*) as 'type_gender' from fiche_personne;";

    $membre_par_page = 16;

    $results_membre = $recup_var->query($count_membre,PDO::FETCH_ASSOC);
    $membre_number =$results_membre->fetch()['type_gender'];
    $nbr_page = ceil($membre_number/$membre_par_page);

    for($i=1;$i<=$nbr_page;$i++){

        echo "<a href=\"http://localhost/W@C/Projet/my_cinema/recherche_by_membre.php?page=$i\"> $i </a> \ ";
    }
}

function pagination_salle(){

    $recup_var = connect_sql();

    $count_membre = "select count(*) as 'nbr_salle' from salle;";
    $results_salle = $recup_var->query($count_membre,PDO::FETCH_ASSOC);
    $salle_number = $results_salle->fetch()['nbr_salle'];
    $salle_par_page = 6;
    $nbr_page = ceil($salle_number/$salle_par_page);

    for($i=1;$i<=$nbr_page;$i++){

        echo "<a href=\"http://localhost/W@C/Projet/my_cinema/recherche_salle.php?page=$i\"> $i </a> \ ";
    }
}