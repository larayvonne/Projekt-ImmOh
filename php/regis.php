<?php
session_start();
$formWerte = $_SESSION['form'] ?? [];
$fehlerFelder = $_SESSION['fehler'] ?? [];
$meldung = $_SESSION['meldung'] ?? null;
unset($_SESSION['meldung'], $_SESSION['fehler']);
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
        <a class="text-decoration-none replace-link-dark" href="index.php">
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

      <form method="post" action="regisBackend.php">
        <div class="form-group">
          <label for="vorname">Vorname</label>
          <input id="vorname" name="vorname" class="form-control <?= in_array('vorname', $fehlerFelder) ? 'is-invalid' : '' ?>"
            value="<?= htmlspecialchars($formwerte ['vorname'] ?? '') ?>" required>
        </div>
        <div class="form-group">
          <label for="nachname">Nachname</label>
          <input id="nachname" name="nachname" class="form-control <?= in_array('nachname', $fehlerFelder) ? 'is-invalid' : '' ?>"
            value="<?= htmlspecialchars($formwerte ['nachname'] ?? '') ?>" required>
        </div>
        <div class="form-group">
          <label for="adresse">Adresse</label>
          <input id="adresse" name="adresse" class="form-control <?= in_array('adresse', $fehlerFelder) ? 'is-invalid' : '' ?>"
            value="<?= htmlspecialchars($formwerte ['adresse'] ?? '') ?>" required>
        </div>
        <div class="form-group">
          <label for="plz">PLZ</label>
          <input id="plz" name="plz" type="text" pattern="\d{4,5}" maxlength="5"
            class="form-control <?= in_array('plz', $fehlerFelder) ? 'is-invalid' : '' ?>"
            value="<?= htmlspecialchars($formwerte ['plz'] ?? '') ?>"
            required>
        </div>
        <div class="form-group">
          <label for="ort">Ort</label>
          <input id="ort" name="ort" class="form-control <?= in_array('ort', $fehlerFelder) ? 'is-invalid' : '' ?>"
            value="<?= htmlspecialchars($formwerte ['ort'] ?? '') ?>" required>
        </div>
        <div class="form-group">
          <label for="land">Land</label>
          <select class="form-select bg-white" id="land" name="land" required>
            <option value="">Bitte wählen</option>
            <option value="AT" <?= ($formWerte['land'] ?? '') === 'AT' ? 'selected' : '' ?>>Österreich</option>
            <option value="DE" <?= ($formWerte['land'] ?? '') === 'DE' ? 'selected' : '' ?>>Deutschland</option>
            <option value="CH" <?= ($formWerte['land'] ?? '') === 'CH' ? 'selected' : '' ?>>Schweiz</option>
          </select>
        </div>
        <div class="form-group">
          <label for="email">E-Mail</label>
          <input id="email" name="email" type="email" placeholder="e.g. muster@mail.at" class="form-control <?= in_array('email', $fehlerFelder) ? 'is-invalid' : '' ?>"
            value="<?= htmlspecialchars($formwerte ['email'] ?? '') ?>" required>
        </div>
        <div class="form-group">
          <label for="password">Passwort</label>
          <input id="password" name="password" type="password" minlength="8"
            class="form-control <?= in_array('password', $fehlerFelder) ? 'is-invalid' : '' ?>"
            placeholder="********" required>
        </div>
        <button type="submit" class="btn login-btn">Registrierung durchführen</button>
      </form>
    </div>
  </main>

  <?php include("../components/footer.php"); ?>
  <script src="../js/function.js"></script>

</body>

</html>