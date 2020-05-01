# My Cinema

## Informations

```bash
    Login admin and register doesn't work 
    All users have the same and original password : mdp1
    Some bug when you try to give a critic 
```

## Export the database  

```bash
    mysqldump --user=your_username --password=your_pwd --databases cinema > cinema.sql
```
 
## Import he database  

```bash
    mysql --user=your_username --password=your_pwd cinema < cinema.sql
```

# For the database 

## Connexion on your database

````bash
    Change the username and password in src > Tools > Database.php 
    and DSN if you don't use MySql or MariaDB
````

# Website preview

![my_cinema](.github/preview/home.png "Home page preview")
![my_cinema](.github/preview/login_user.png "User login page preview")
![my_cinema](.github/preview/login_admin.png "User admin page preview")
![my_cinema](.github/preview/register.png "Register page preview")
![my_cinema](.github/preview/movies.png "Search movies page preview")
![my_cinema](.github/preview/reductions.png " Reductions page preview")
![my_cinema](.github/preview/abonnements.png " Abonnement page preview")
![my_cinema](.github/preview/salle.png " Salles page preview")
![my_cinema](.github/preview/members.png " Members page preview")
![my_cinema](.github/preview/historique.png " Historique page preview")

