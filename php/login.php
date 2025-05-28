<?php session_start(); ?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
<<<<<<< HEAD
  <link rel="stylesheet" href="../css/cssLogin.css">
=======
>>>>>>> e4ac21ec29fce050bc3ab5f70dc46d9a3787b2fa
  <link rel="stylesheet" href="../css/cssLayout.css">
  <link rel="stylesheet" href="../css/cssLogin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>


<body class="replace-bg-dark">
  <?php include("../components/header.php"); ?>
 
  
    <main class="login-container">
  
    <div class="login-box">
      <h3 class="login-title">Login</h3>
      <form action="function" method="post">
        <div class="form-group">
          <label for="mail">E-Mail</label>
          <input id="mail" name="mail" type="email" placeholder="e.g. muster@mail.at" required>
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
  

<<<<<<< HEAD
</main>
=======
  <main>
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

    <h3>Login</h3>
    <?php

    session_start();

    if (isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true) {
      echo "Hallo " . $_SESSION["username"];
    ?>
      <form action="logout.php" method="post">
        <input type="submit" value="Logout">
      </form>
    <?php

    } else {

    ?>
      <form class="ms-3" action="loginphp.php" method="post">
      <div>
        <label for="username">Username</label>
        <input id="username" name="username" type="text" required>
      </div>
      <div>
        <label for="password">Passwort</label>
        <input id="password" name="password" type="password" required>
      </div>
      <div>
        <button class="btn btn-outline-dark border-2 btn-compact me-2" type="submit">einloggen</button>
        <button class="btn btn-outline-dark border-2 btn-compact me-2"><a href="regis.php"></a>Konto erstellen</button>
      </div>
      </form>
    <?php
    }
    ?>
  </main>
>>>>>>> 4ee26c90624adc207ed673175e0960630c7e2154

  <?php include("../components/footer.php"); ?>

  <script src="../jslogin.js"></script>
</body>

</html>