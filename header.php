<?php
    include ('connexion_sql.php');
    include ('fonctions.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Header</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header>
        <div class="container">
            <div class="row">
                <h1>
                    <a href="index.php">
                        My_cinema
                    </a>
                </h1>

                <nav class ="col-md-12 text-right">
                    <ul>
                        <li>
                            <a href="connexion_client.php">
                                Espace client
                            </a>
                        </li>

                        <li>
                            <a href="connexion_admin.php">
                               Espace administrateur
                            </a>
                        </li>

                        <li>
                            <a href="new_user.php">
                               Créer un espace
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>

            <div class="row">
                <nav class ="col-md-12 text-right">
                    <ul>
                        <li>
                            <a href="index.php">
                                Accueil
                            </a>
                        </li>

                        <li>
                            <a href="recherche_by_film.php">
                                Recherche de film
                            </a>
                        </li>

                        <li>
                            <a href="recherche_by_membre.php">
                                Recherche de membre
                            </a>
                        </li>

                        <li>
                            <a href="recherche_salle.php">
                                Recherche de salle
                            </a>
                        </li>

                        <li>
                            <a href="tarif.php">
                                Tarif
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>