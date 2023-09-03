<?php
ob_start();

$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "toor";
$db['db_name'] = "ecf_php";

foreach ($db as $key => $value) {
    define(strtoupper($key), $value);
}

$connection = mysqli_connect('localhost','root','toor','ecf_php');


// Vérification de la connexion
// if ($connection) {
//     echo "La connexion à la base de données a réussi";
// } else {
//     echo "La connexion à la base de données a échoué : " . mysqli_connect_error();
// }

?>