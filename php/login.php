<?php
session_start();
require_once("../components/dbaccess.php");
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['passwort'];

    // SICHERE Variante mit Prepared Statement
    $stmt = $db_obj->prepare("SELECT * FROM user WHERE email = ? AND passwort = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $message = "Login erfolgreich! 🟢";// hier dan verlinkung zu KD login
    } else {
        $message = "User nicht vorhanden!"; 
    }
    $stmt->close();
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
 
  <link rel="stylesheet" href="../css/cssLayout.css">
  <link rel="stylesheet" href="../css/cssLogin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<?php include("../components/header.php"); ?>

<body class="replace-bg-dark">
     <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3 ms-2">
        <li class="breadcrumb-item">
          <a class="text-decoration-none replace-link-dark" href="index.php">
            <i class="fas fa-home"></i> ImmOH!
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Login </li>
      </ol>
    </nav>

    <main class="login-container">
    <div class="login-box">
      <h3 class="login-title">Login</h3>
      <form action="function" method="post">
        <div class="form-group">
          <label for="email">E-Mail</label>
          <input id="email" name="email" type="email" placeholder="e.g. muster@mail.at" required>
        </div>
        <div class="form-group">
          <label for="password">Passwort</label>
          <input id="password" name="password" type="password" minlength="8" required>
        </div>
        <div class="form-remember">
          <input type="checkbox" id="remember" name="remember">
          <label for="remember">Angemeldet bleiben</label>
        </div>
        <button type="submit" class="login-btn">Login</button>
        <div class="register-link">
          <span>Noch kein Konto?</span>
          <a href="regis.php">Konto erstellen</a>
        </div>
      </form>
        </div>
         <p><?= htmlspecialchars($message) ?></p>
  </main>
 
  <?php include("../components/footer.php"); ?>

  <script src="../jslogin.js"></script>
</body>

</html>