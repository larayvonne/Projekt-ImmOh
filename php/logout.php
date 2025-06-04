<?php
session_start();
$_SESSION['meldung'] = "Du wurdest erfolgreich ausgeloggt.";

header("Location: index.php");
session_unset();
session_destroy();

// Toast-Meldung für erfolgreichen Logout
session_start(); // neue Session starten, um die Meldung zu setzen
$_SESSION['meldung'] = "Du wurdest erfolgreich ausgeloggt.";

header("Location: index.php");
exit;