<?php
session_start();
if (!isset($_SESSION['rolle']) || $_SESSION['rolle'] !== 'admin') {
    http_response_code(403);
    echo "Zugriff verweigert.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    require_once "../components/dbaccess.php";

    $id = intval($_POST['id']);

    $stmt = $conn->prepare("UPDATE user SET aktiv = 1 WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: benutzerverwaltung.php?success=1");
        exit();
    } else {
        echo "Fehler bei der Reaktivierung.";
    }
} else {
    http_response_code(400);
    echo "Ungültige Anfrage.";
}
?>