<?php
session_start();
require_once "../components/dbaccess.php";

if (!isset($_SESSION['user_id'])) {
  header("Location: login.php");
  exit;
}

$userId = $_SESSION['user_id'];

// Nutzer laden
$stmt = $conn->prepare("SELECT vorname, nachname, adresse, plz, ort, land, email, profilbild FROM user WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($vorname, $nachname, $adresse, $plz, $ort, $land, $email, $profilbild);
$stmt->fetch();
$stmt->close();

// Standardbild fallback
if (!$profilbild) {
  $profilbild = 'default.jpg';
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil bearbeiten</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/cssLayout.css">
</head>

<body class="replace-bg-dark">
  <?php include("../components/header.php"); ?>

  <div class="container py-5">
    <h2 class="mb-4">Profil bearbeiten</h2>

    <div class="mb-4">
      <img src="../uploads/<?= htmlspecialchars($profilbild) ?>" alt="Profilbild" class="rounded-circle" width="120">
    </div>

    <form action="profilUpdate.php" method="post" enctype="multipart/form-data">
      <div class="row g-3">
        <div class="col-md-6">
          <label for="vorname" class="form-label">Vorname</label>
          <input type="text" class="form-control" name="vorname" id="vorname" value="<?= htmlspecialchars($vorname) ?>" required>
        </div>
        <div class="col-md-6">
          <label for="nachname" class="form-label">Nachname</label>
          <input type="text" class="form-control" name="nachname" id="nachname" value="<?= htmlspecialchars($nachname) ?>" required>
        </div>
        <div class="col-md-12">
          <label for="adresse" class="form-label">Adresse</label>
          <input type="text" class="form-control" name="adresse" id="adresse" value="<?= htmlspecialchars($adresse) ?>" required>
        </div>
        <div class="col-md-4">
          <label for="plz" class="form-label">PLZ</label>
          <input type="text" class="form-control" name="plz" id="plz" value="<?= htmlspecialchars($plz) ?>" required>
        </div>
        <div class="col-md-4">
          <label for="ort" class="form-label">Ort</label>
          <input type="text" class="form-control" name="ort" id="ort" value="<?= htmlspecialchars($ort) ?>" required>
        </div>
        <div class="col-md-4">
          <label for="land" class="form-label">Land</label>
          <select name="land" id="land" class="form-select" required>
            <option value="AT" <?= $land === 'AT' ? 'selected' : '' ?>>Österreich</option>
            <option value="DE" <?= $land === 'DE' ? 'selected' : '' ?>>Deutschland</option>
            <option value="CH" <?= $land === 'CH' ? 'selected' : '' ?>>Schweiz</option>
          </select>
        </div>
        <div class="col-md-6">
          <label for="email" class="form-label">E-Mail</label>
          <input type="email" class="form-control" name="email" id="email" value="<?= htmlspecialchars($email) ?>" required>
        </div>
        <div class="col-md-6">
          <label for="new_password" class="form-label">Neues Passwort (optional)</label>
          <input type="password" class="form-control" name="new_password" id="new_password">
        </div>
        <div class="col-md-12">
          <label for="profilbild" class="form-label">Profilbild ändern</label>
          <input type="file" class="form-control" name="profilbild" id="profilbild" accept="image/*">
        </div>
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-success">Änderungen speichern</button>
      </div>
    </form>
  </div>

  <?php include("../components/footer.php"); ?>
</body>
</html>