<?php

$host = "localhost";
$dbname = "immoh";
$dbuser = "root";
$dbpass = "";

$db_obj = new mysqli($host,$dbuser,$dbpass,$dbname);
if ($db_obj->connect_error)
{
    die("Verbindung zur Datenbank fehlgeschlagen: " . $db_obj->connect_error);
}

?>