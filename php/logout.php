<?php
session_start();
$_SESSION['meldung'] = "Du wurdest erfolgreich ausgeloggt.";

header("Location: index.php");
setcookie('remember_me', '', time() - 3600, "/");

session_unset();
session_destroy();

// Toast für Logout
session_start(); // neue Session starten, um die Meldung zu setzen
$_SESSION['meldung'] = "Du wurdest erfolgreich ausgeloggt.";

header("Location: index.php");
exit;
?>