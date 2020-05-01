#
Add notice column
alter table historique_membre add avis text null;

#
Add of the MDP column for the fiche_personne table
alter table fiche_personne add mdp varchar(255) null;

# Generate a unique password
update fiche_personne set mdp = 'mdp1' ;
