<?php
session_start();
require_once "../components/dbaccess.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  //Eingabeprüfung
  if (empty($_POST['email']) || empty($_POST['password'])) {
    $meldung = "Bitte E-Mail und Passwort eingeben.";
  } else {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    //Benutzer aus Datenbank holen
    $stmt = $conn->prepare("SELECT id, vorname, password, rolle, aktiv FROM user WHERE email = ?");
    if ($stmt) {
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $stmt->store_result();

      if ($stmt->num_rows === 1) {
        $stmt->bind_result($userid, $vorname, $hashedPassword, $rolle, $aktiv);
        $stmt->fetch();

        //Kontoaktivität und Passwort prüfen
        if (!$aktiv) {
          $meldung = "Konto gesperrt. Bitte wenden Sie sich an den Kundendienst.";
        } elseif (password_verify($password, $hashedPassword)) {

          //Session setzen
          $_SESSION['user_id'] = $userid;
          $_SESSION['user_email'] = $email;
          $_SESSION['rolle'] = $rolle;
          $_SESSION['vorname'] = $vorname;
          $_SESSION['meldung'] = "$vorname wurde erfolgreich eingeloggt!";

          //Cookie setzen
          if (isset($_POST['remember'])) {
            $cookieWert = base64_encode("$userid:$hashedPassword");
            setcookie('remember_me', $cookieWert, time() + (30 * 24 * 60 * 60), "/");
          }

          header("Location: index.php");
          exit;

        } else {
          $meldung = "E-Mail oder Passwort falsch";
        }
      }
      $stmt->close();
    }
    $conn->close();
  }
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssLogin.css">
  <link rel="stylesheet" href="../css/cssLayout.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
        Login </li>
    </ol>
  </nav>

  <main class="login-container">
    <?php if (isset($meldung)) echo "<script>alert('$meldung');</script>"; ?>

    <div class="login-box">
      <h3 class="login-title">Login</h3>
      <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <div class="form-group">
          <label for="email">E-Mail</label>
          <input id="email" name="email" type="email" placeholder="e.g. muster@mail.at" required>
        </div>
        <div class="form-group">
          <label for="password">Passwort</label>
          <input id="password" name="password" type="password" minlength="8" required>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="checkbox" name="remember" id="remember">
          <label class="form-check-label" for="remember">
            Angemeldet bleiben
          </label>
        </div>
        <button type="submit" class="login-btn">Login</button>
        <div class="register-link">
          <span>Noch kein Konto?</span>
          <a href="regis.php">Konto erstellen</a>
        </div>
      </form>
    </div>

  </main>

  <?php include("../components/footer.php"); ?>
  <script src="../js/function.js"></script>

</body>

</html>