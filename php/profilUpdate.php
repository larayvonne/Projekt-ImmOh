<?php
session_start();
require_once '../components/dbaccess.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userId = $_SESSION['user_id'];
$errors = [];

// Eingabewerte holen & validieren
$vorname = trim($_POST['vorname'] ?? '');
$nachname = trim($_POST['nachname'] ?? '');
$adresse = trim($_POST['adresse'] ?? '');
$plz = trim($_POST['plz'] ?? '');
$ort = trim($_POST['ort'] ?? '');
$land = trim($_POST['land'] ?? '');
$email = trim($_POST['email'] ?? '');
$passwort = $_POST['new_password'] ?? '';
$passwort2 = $_POST['new_password_repeat'] ?? '';

if (!empty($passwort) || !empty($passwort2)) {
    if ($passwort !== $passwort2) {
        $errors[] = "Die eingegebenen Passwörter stimmen nicht überein.";
    } elseif (strlen($passwort) < 6) {
        $errors[] = "Das neue Passwort muss mindestens 6 Zeichen lang sein.";
    } else {
        $hashedPasswort = password_hash($passwort, PASSWORD_DEFAULT);
    }
}


// Validierung
if (empty($vorname) || empty($nachname) || empty($adresse) || empty($plz) || empty($ort) || empty($land) || empty($email)) {
    $errors[] = "Alle Felder müssen ausgefüllt werden.";
}

if (!preg_match('/^[0-9]{4}$/', $plz)) {
    $errors[] = "PLZ muss genau vier Ziffern enthalten.";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Ungültige E-Mail-Adresse.";
}

// Profilbildverarbeitung
$profilbildName = null;
if (isset($_FILES['profilbild']) && $_FILES['profilbild']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../uploads/';
    $fileTmp = $_FILES['profilbild']['tmp_name'];
    $fileName = basename($_FILES['profilbild']['name']);
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExts = ['jpg', 'jpeg', 'png'];

    if (!in_array($fileExt, $allowedExts)) {
        $errors[] = "Nur .jpg und .png sind als Profilbild erlaubt.";
    } else {
        $newFileName = 'profil_' . $userId . '_' . time() . '.' . $fileExt;
        $filePath = $uploadDir . $newFileName;

        // Altes Bild löschen, wenn nicht default.png
        $query = $conn->prepare("SELECT profilbild FROM user WHERE id = ?");
        $query->bind_param("i", $userId);
        $query->execute();
        $result = $query->get_result();
        $user = $result->fetch_assoc();

        if ($user && $user['profilbild'] !== 'default.png' && file_exists($uploadDir . $user['profilbild'])) {
            unlink($uploadDir . $user['profilbild']);
        }

        if (!move_uploaded_file($fileTmp, $filePath)) {
            $errors[] = "Fehler beim Hochladen des Profilbildes.";
        } else {
            $profilbildName = $newFileName;
        }
    }
}

// Wenn keine Fehler –> Datenbank aktualisieren
if (empty($errors)) {
    if ($profilbildName && isset($hashedPasswort)) {
        $stmt = $conn->prepare("UPDATE user SET vorname=?, nachname=?, adresse=?, plz=?, ort=?, land=?, email=?, profilbild=?, passwort=? WHERE id=?");
        $stmt->bind_param("ssssssssssi", $vorname, $nachname, $adresse, $plz, $ort, $land, $email, $profilbildName, $hashedPasswort, $userId);
    } elseif ($profilbildName) {
        $stmt = $conn->prepare("UPDATE user SET vorname=?, nachname=?, adresse=?, plz=?, ort=?, land=?, email=?, profilbild=? WHERE id=?");
        $stmt->bind_param("ssssssssi", $vorname, $nachname, $adresse, $plz, $ort, $land, $email, $profilbildName, $userId);
    } elseif (isset($hashedPasswort)) {
        $stmt = $conn->prepare("UPDATE user SET vorname=?, nachname=?, adresse=?, plz=?, ort=?, land=?, email=?, password=? WHERE id=?");
        $stmt->bind_param("ssssssssi", $vorname, $nachname, $adresse, $plz, $ort, $land, $email, $hashedPasswort, $userId);
    } else {
        $stmt = $conn->prepare("UPDATE user SET vorname=?, nachname=?, adresse=?, plz=?, ort=?, land=?, email=? WHERE id=?");
        $stmt->bind_param("sssssssi", $vorname, $nachname, $adresse, $plz, $ort, $land, $email, $userId);
    }

    if ($stmt->execute()) {
        $_SESSION['vorname'] = $vorname;
        header("Location: profil.php?update=success");
        exit();
    } else {
        $errors[] = "Fehler beim Speichern der Änderungen.";
    }
}

// Bei Fehlern zurück zur Profilseite
$_SESSION['profil_update_errors'] = $errors;
header("Location: profil.php?update=fail");
exit();
?>