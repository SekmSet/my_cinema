<?php
    include ('header.php');
?>

<div>
    <form action="">

        <div class="col-md-12">
            <label>Je suis :
                <input type="radio" name="is_user" value="client"> Client
                <input type="radio" name="is_admin" value="admin"> Administrateur
            </label>
        </div>

        <div>
            <label for="prenom">Prénom
                <input type="text" name="prenom" placeholder="Kaname" required>
            </label>

            <label for="nom">Nom
                <input type="text" name="nom" placeholder="Kuran" required>
            </label>

            <label for="nom">Nom
                <input type="text" name="nom" placeholder="Kuran" required>
            </label>

            <label for="sexe">Sexe
                <input type="radio" name="is_female" value="femme"> Femme
                <input type="radio" name="is_male" value="homme"> Homme
            </label>

            <label for="naissance">Date de naissance
                <input type="date" name="naissance" placeholder="" required>
            </label>

            <label for="mail">Mail
                <input type="email" name="mail" placeholder="kaname.kuran@orange.fr" required>
            </label>

            <label for="tel">Téléphone
                <input type="tel" name="tel" placeholder="0610101010" required>
            </label>

            <label for="ville">Ville
                <input type="text" name="ville" placeholder="Lyon" required>
            </label>

            <label for="cp">Mail
                <input type="number" name="cp" placeholder="69003" required>
            </label>
        </div>

        <div>
            <label for="abonnement">Abonnement
                <input type="radio" name="is_female" value="oui" checked> Oui
                <input type="radio" name="is_male" value="non"> Non
            </label>

            <label for="choix_abo"> Choix de votre abonnement </label>
                <select name="abonnement" id="choix_abo">
                    <option value="element_choose">Selection d'un élément</option>
                    <option value="vip">VIP</option>
                    <option value="gold">Gold</option>
                    <option value="classic">Classic</option>
                    <option value="pass_day">pass day</option>
                </select>
        </div>

        <div>
            <label for="user_name">Nom d'utilisteur
                <input type="text" name="user_name" placeholder="User_1" required>
            </label>

            <label for="pwd_account">Mot de passe
                <input type="password" name="pwd_account" placeholder="*****" required>
            </label>

        </div>

        <div class="col-md-6">
            <input type="submit" value="Inscription">
        </div>
    </form>
</div>


<?php
    require ("footer.php");
?>