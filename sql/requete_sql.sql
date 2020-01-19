# ajoute la colonne avis
alter table historique_membre add avis text null;

# Ajout de la colonne MDP pour la table fiche_personne
alter table fiche_personne add mdp varchar(255) null;

# generation du MDP pour tous
update fiche_personne set mdp = 'mdp1' ;
