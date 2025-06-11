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

// Standardbild setzen
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
  <link rel="stylesheet" href="../css/cssLogin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<?php include("../components/header.php"); ?>

<body class="replace-bg-dark">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-3 ms-2">
      <li class="breadcrumb-item">
        <a class="text-decoration-none replace-link-dark" href="index.html">
          <i class="fas fa-home"></i> ImmOH!
        </a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        mein Profil </li>
    </ol>
  </nav>



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
        <div class="col-md-6">
          <label for="adresse" class="form-label">Adresse</label>
          <input type="text" class="form-control" name="adresse" id="adresse" value="<?= htmlspecialchars($adresse) ?>" required>
        </div>
        <div class="col-md-3">
          <label for="plz" class="form-label">PLZ</label>
          <input type="text" class="form-control" name="plz" id="plz" value="<?= htmlspecialchars($plz) ?>" required>
        </div>
        <div class="col-md-3">
          <label for="ort" class="form-label">Ort</label>
          <input type="text" class="form-control" name="ort" id="ort" value="<?= htmlspecialchars($ort) ?>" required>
        </div>
        <div class="col-md-6">
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
        <div class="col-md-6">
          <label for="new_password_repeat" class="form-label">Neues Passwort wiederholen</label>
          <input type="password" class="form-control" name="new_password_repeat" id="new_password_repeat">
        </div>
        <div class="col-md-12">
          <label for="profilbild" class="form-label">Profilbild ändern</label>
          <input type="file" class="form-control" name="profilbild" id="profilbild" accept=".jpg,.jpeg,.png">
        </div>
      </div>

      <div class="mt-5">
        <button type="submit" class="btn login-btn">Änderungen speichern</button>
      </div>
    </form>
  </div>

  <?php include("../components/footer.php"); ?>

  <script>
    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }
  </script>
  <?php if (isset($_GET['update']) && $_GET['update'] === 'success' && isset($_SESSION['vorname'])): ?>
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
      <div id="profilToast" class="toast align-items-center toast-custom-success border-0 show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
          <div class="toast-body">
            Dein Profil wurde erfolgreich aktualisiert.
          </div>
          <button type="button" class="btn-close toast-custom-success me-2 m-auto" data-bs-dismiss="toast" aria-label="Schließen"></button>
        </div>
      </div>
    </div>
  <?php endif; ?>

</body>

</html>