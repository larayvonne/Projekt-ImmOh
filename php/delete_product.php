<?php
session_start();
require_once "../components/dbaccess.php";

// Zugriff nur für admin
if (!isset($_SESSION['user_id']) || $_SESSION['rolle'] !== 'admin') {
    header("Location: ../pages/index.php?error=unauthorized");
    exit();
}

// Produkt-ID überprüft
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['produkt_id'])) {
    $produkt_id = intval($_POST['produkt_id']);

    // Pfad suchen 
    $stmtBild = $conn->prepare("SELECT bild FROM secondhand WHERE second_id = ?");
    $stmtBild->bind_param("i", $produkt_id);
    $stmtBild->execute();
    $result = $stmtBild->get_result();
    if ($row = $result->fetch_assoc()) {
        $bild = $row['bild'];
        if (!empty($bild) && file_exists($bild) && $bild !== '../resources/platzhalter.png') {
            unlink($bild); // Bild löschen
        }
    }

    // Produkt aus der DB löschen
    $stmt = $conn->prepare("DELETE FROM secondhand WHERE second_id = ?");
    $stmt->bind_param("i", $produkt_id);
    if ($stmt->execute()) {
        header("Location: admin.php?msg=deleted");
    } else {
        header("Location: admin.php?msg=error");
    }
    exit();
} else {
    header("Location: admin.php?msg=invalid");
    exit();
}
?>