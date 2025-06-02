<?php
require_once "../components/dbaccess.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $vorname  = trim($_POST['vorname'] ?? '');
  $nachname = trim($_POST['nachname'] ?? '');
  $adresse  = trim($_POST['adresse'] ?? '');
  $plz      = trim($_POST['plz'] ?? '');
  $ort      = trim($_POST['ort'] ?? '');
  $email    = trim($_POST['email'] ?? '');
  $password = $_POST['password'] ?? '';

  if (
    empty($vorname) || empty($nachname) || empty($adresse) ||
    empty($plz) || empty($ort) || empty($email) || empty($password)
  ) {
    $meldung = "Bitte alle Felder ausfüllen.";
  } else {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare(
      "INSERT INTO user (vorname, nachname, adresse, plz, ort, email, passwort)
       VALUES (?, ?, ?, ?, ?, ?, ?)"
    );

    if ($stmt) {
      $stmt->bind_param("sssssss", $vorname, $nachname, $adresse, $plz, $ort, $email, $hashedPassword);
      if ($stmt->execute()) {
        $meldung = "Registrierung erfolgreich!";
      } else {
        $meldung = "Fehler beim Speichern: " . $stmt->error;
      }
      $stmt->close();
    } else {
      $meldung = "Statement konnte nicht vorbereitet werden.";
    }
  }

  $conn->close();
}
?>


<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrierung</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssLayout.css">
  <link rel="stylesheet" href="../css/cssLogin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="replace-bg-dark">
  <?php include("../components/header.php"); ?>

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-3 ms-2">
      <li class="breadcrumb-item">
        <a class="text-decoration-none replace-link-dark" href="index.html">
          <i class="fas fa-home"></i> ImmOH!
        </a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">
        Registrieren </li>
    </ol>
  </nav>
  <main class="login-container">

    <div class="login-box">
      <h3 class="login-title">Registrierung</h3>

      <?php if (isset($meldung)) echo "<p style='color:red;'>$meldung</p>"; ?>

      <form method="post" action="regis.php">
        <div class="form-group">
          <label for="vorname">Vorname</label>
          <input id="vorname" name="vorname" required>
        </div>
        <div class="form-group">
          <label for="nachname">Nachname</label>
          <input id="nachname" name="nachname" required>
        </div>
        <div class="form-group">
          <label for="adresse">Adresse</label>
          <input id="adresse" name="adresse" required>
        </div>
        <div class="form-group">
          <label for="plz">PLZ</label>
          <input id="plz" name="plz" required>
        </div>
        <div class="form-group">
          <label for="ort">Ort</label>
          <input id="ort" name="ort" required>
        </div>
        <div class="form-group">
          <label for="email">E-Mail</label>
          <input id="email" name="email" type="email" placeholder="e.g. muster@mail.at" required>
        </div>
        <div class="form-group">
          <label for="password">Passwort</label>
          <input id="password" name="password" type="password" minlength="8" placeholder="********" required>
        </div>
        <div class="form-remember">
          <input type="checkbox" id="remember" name="remember">
          <label for="remember">Angemeldet bleiben</label>
        </div>
        <button type="submit" class="login-btn">Login</button>
      </form>
    </div>


  </main>

  <?php include("../components/footer.php"); ?>

  <script>
    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }
  </script>
</body>

</html>