<?php
session_start();
require_once "../components/dbaccess.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$user_id = $_SESSION['user_id'];

$vorname  = $_POST['vorname'] ?? '';
$nachname = $_POST['nachname'] ?? '';
$adresse  = $_POST['adresse'] ?? '';
$plz      = $_POST['plz'] ?? '';
$ort      = $_POST['ort'] ?? '';
$land     = $_POST['land'] ?? '';
$email    = $_POST['email'] ?? '';
$password = $_POST['new_password'] ?? '';
$repeat   = $_POST['new_password_repeat'] ?? '';

$profilbild_name = '';

// Profilbild prüfen
if (isset($_FILES['profilbild']) && $_FILES['profilbild']['error'] === UPLOAD_ERR_OK) {
    $upload_dir = '../uploads/';
    $profilbild_name = basename($_FILES['profilbild']['name']);
    $upload_path = $upload_dir . $profilbild_name;

    if (!move_uploaded_file($_FILES['profilbild']['tmp_name'], $upload_path)) {
        $_SESSION['update_error'] = "Fehler beim Hochladen des Profilbilds.";
        header("Location: profil.php");
        exit;
    }
}

// Dynamisches SQL vorbereiten
$updateFields = [];
$params = [];
$types = "";

// Pflichtfelder
$updateFields[] = "vorname=?";
$params[] = $vorname;
$types .= "s";

$updateFields[] = "nachname=?";
$params[] = $nachname;
$types .= "s";

$updateFields[] = "adresse=?";
$params[] = $adresse;
$types .= "s";

$updateFields[] = "plz=?";
$params[] = $plz;
$types .= "s";

$updateFields[] = "ort=?";
$params[] = $ort;
$types .= "s";

$updateFields[] = "land=?";
$params[] = $land;
$types .= "s";

$updateFields[] = "email=?";
$params[] = $email;
$types .= "s";

// Optional: Profilbild
if (!empty($profilbild_name)) {
    $updateFields[] = "profilbild=?";
    $params[] = $profilbild_name;
    $types .= "s";
}

// Optional: Passwort
if (!empty($password)) {
    if ($password === $repeat) {
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        $updateFields[] = "password=?";
        $params[] = $password_hash;
        $types .= "s";
    } else {
        $_SESSION['update_error'] = "Die Passwörter stimmen nicht überein.";
        header("Location: profil.php");
        exit;
    }
}

// ID erst jetzt ans Ende anhängen
$params[] = $user_id;
$types .= "i";

// SQL aufbauen
$sql = "UPDATE user SET " . implode(", ", $updateFields) . " WHERE id=?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    $_SESSION['update_error'] = "Fehler bei der Datenbankabfrage.";
    header("Location: profil.php");
    exit;
}

$stmt->bind_param($types, ...$params);

if ($stmt->execute()) {
    $_SESSION['profilToast'] = "Profil erfolgreich aktualisiert.";
    $_SESSION['vorname'] = $vorname;
} else {
    $_SESSION['profilToast'] = "Fehler beim Aktualisieren: " . $stmt->error;
}

$stmt->close();
$conn->close();

header("Location: profil.php?update=success");

exit;
?>