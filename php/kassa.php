<?php
session_start();
require_once "../components/dbaccess.php";

// Bestellung speichern (nur Beispiel!)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';

    // Bestellung in Tabelle `orders` einfügen + Session-Warenkorb leeren
    // (Tabellenstruktur nicht gezeigt – kann ich dir aber erstellen)

    $_SESSION['cart'] = [];
    header('Location: danke.php');
    exit;
}
?>

<form method="POST">
  <h2>Bestellung abschließen</h2>
  <label>Name: <input type="text" name="name" required></label><br>
  <label>Email: <input type="email" name="email" required></label><br>
  <button type="submit">Zahlungspflichtig bestellen</button>
</form>
