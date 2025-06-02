<?php
$host = "localhost";
$dbname = "immoh";         // Deine Datenbank
$dbuser = "root";          // XAMPP-Standardnutzer
$dbpass = "";              // Kein Passwort in XAMPP

$conn = new mysqli($host, $dbuser, $dbpass, $dbname);

// Verbindung prüfen
if ($conn->connect_error) {
    die("Verbindung zur Datenbank fehlgeschlagen: " . $conn->connect_error);
}
