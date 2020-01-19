<?php
    session_start();

    include ('connexion_sql.php');
    include ('fonctions.php');

    if(isset($_GET['deconnexion'])){
        session_destroy();
        session_start();
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Header</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Special+Elite&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rye&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Love+Ya+Like+A+Sister&display=swap" rel="stylesheet">


    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header class="container px-3 py-3">
        <div>
            <div class="col-md-12">
                <div class="row">
                    <h1 id="titre_web">
                        <a href="index.php">
                            My_cinema
                        </a>
                    </h1>
                </div>
            </div>
        </div>

        <div>
            <nav class ="col-md-12 text-right">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="connexion_client.php">
                                Espace client
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="connexion_admin.php">
                           Espace administrateur
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="new_user.php">
                           Créer un espace
                        </a>
                    </li>
                    <?php if (isset($_SESSION['client'])){ ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php?deconnexion=1">
                                Deconnexion
                            </a>
                        </li>
                    <?php } ?>



                </ul>
            </nav>
        </div>
        <div>
            <div class="row">
                <nav class ="col-md-12 text-right">
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">
                                Accueil
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="recherche_by_film.php">
                                Recherche de film
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="recherche_by_membre.php">
                                Recherche de membre
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active" href="recherche_salle.php">
                                Recherche de salle
                            </a>
                        </li>

                        <li class="nav-item" id="dropdown">
                            <a class="nav-link active" href="#">
                                Tarif
                            </a>
                            <ul>
                                <li>
                                    <a class="nav-link active" href="abonnement.php">
                                        Abonnement
                                    </a>
                                </li>

                                <li>
                                    <a class="nav-link active" href="reduction.php">
                                        Reduction
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>

        <div>
            <?php
                if (isset($_SESSION['client'])) { ?>
                    <p> Bonjour <?=$_SESSION['client']['prenom'];?> ! Tu es connecté.e :)</p>
            <?php
                }
            ?>
        </div>

    </header>