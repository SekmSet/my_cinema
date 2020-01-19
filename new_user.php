<?php
    include ('header.php');
?>

<div class="container px-3 py-3">
    <form>

        <div class="form-group">
            <label for="type">Je suis :</label>
            <input type="radio" id="type" name="is_user" value="client"> Client
            <input type="radio" name="is_admin" value="admin"> Administrateur
        </div>

        <div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input class="form-control" type="text" id="prenom" name="prenom" placeholder="Kaname" required>
            </div>

            <div class="form-group">
                <label for="nom">Nom</label>
                <input class="form-control" type="text" id="nom" name="nom" placeholder="Kuran" required>
            </div>

            <div class="form-group">
                <label for="sexe">Sexe</label>
                <input type="radio" id="sexe" name="is_female" value="femme"> Femme
                <input type="radio" name="is_male" value="homme"> Homme
            </div>

            <div class="form-group">
                <label for="naissance">Date de naissance</label>
                <input class="form-control" type="date" id="naissance" name="naissance" required>
            </div>

            <div class="form-group">
                <label for="mail">Mail</label>
                <input class="form-control" type="email" id="mail" name="mail" placeholder="kaname.kuran@orange.fr" required>
            </div>

            <div class="form-group">
                <label for="tel">Téléphone</label>
                <input class="form-control" type="tel" id="tel" name="tel" placeholder="0610101010" required>
            </div>

            <div class="form-group">
                <label for="ville">Ville</label>
                <input class="form-control" type="text" id="ville" name="ville" placeholder="Lyon" required>
            </div>

            <div class="form-group">
                <label for="cp">Mail</label>
                <input class="form-control" type="number" id="cp" name="cp" placeholder="69003" required>
            </div>
        </div>

        <div>
            <div class="form-group">
                <label for="abonnement">Abonnement</label>
                <input type="radio" id="abonnement" name="is_female" value="oui" checked> Oui
                <input type="radio" name="is_male" value="non"> Non
            </div>

            <div class="form-group">
                <label for="choix_abo"> Choix de votre abonnement </label>
                <select class="form-control" name="abonnement" id="choix_abo">
                    <option value="element_choose">Selection d'un élément</option>
                    <option value="vip">VIP</option>
                    <option value="gold">Gold</option>
                    <option value="classic">Classic</option>
                    <option value="pass_day">pass day</option>
                </select>
            </div>
        </div>

        <div>
            <div class="form-group">
                <label for="user_name">Nom d'utilisteur</label>
                <input type="text" id="user_name" name="user_name" placeholder="User_1" required>
            </div>

            <div class="form-group">
                <label for="pwd_account">Mot de passe</label>
                <input type="password" id="pwd_account" name="pwd_account" placeholder="*****" required>
            </div>
        </div>

        <div class="col-md-6">
            <input class = "button" type="submit" value="Inscription">
        </div>
    </form>
</div>


<?php
    require ("footer.php");
?>