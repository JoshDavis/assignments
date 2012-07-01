<?php

//Opens a connection to the MySQL database.
//Shared between all the PHP files in our application.


//Our username and passwords are kept in Environment Variables to they can be kept hidden in .htaccess.
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$data_source = getenv('DATA_SOURCE');

//PDO = PHP Data Objects.
// Allows us to connect to many different kinds of databases.

$db = new PDO($data_source, $user, $pass);

//Force the connection to work in UTF8.
//and support many human languages.
$db->exec('SET NAMES utf8');