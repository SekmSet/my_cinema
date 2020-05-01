<?php

function connect_sql()
{

    $user = 'my_username';
    $pwd = 'my_pwd';
    $dsn = 'mysql:dbname=cinema;host=localhost';

    try {
        $connexion_sql = new PDO($dsn, $user, $pwd);
        return $connexion_sql;
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}