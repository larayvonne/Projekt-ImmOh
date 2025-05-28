<?php session_start(); ?>
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
  <link rel="stylesheet" href="../css/cssRegis.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="replace-bg-dark">
  <?php include("../components/header.php"); ?>

  <main class="regis-container">
      <div class="regis-box">
        <h3 class="regis-title">Registrierung</h3>
        <form action="function" method="post">
          <div class="form-group">
            <label for="anrede">Anrede</label>
            <select id="anrede" name="anrede" class="form-select">
              <option value="Herr">Herr</option>
              <option value="Frau">Frau</option>
              <option value="divers">Divers</option>
            </select>
          </div>

          <div class="form-group">
            <label for="vorname">Vorname</label>
            <input id="vorname" name="firstname" type="text" placeholder="Vorname" required>
          </div>

          <div class="form-group">
            <label for="nachname">Nachname</label>
            <input id="nachname" name="nachname" type="text" placeholder="Nachname" required>
          </div>

          <div class="form-group">
            <label for="adresse">Adresse</label>
            <input id="adresse" name="adresse" type="text" placeholder="Adresse" required>
          </div>

          <div class="form-group">
            <label for="plz">PLZ</label>
            <input id="plz" name="plz" type="text" placeholder="1200" pattern="\d{4}" required>
          </div>

          <div class="form-group">
            <label for="ort">Ort</label>
            <input id="ort" name="ort" type="text" placeholder="Wien" required>
          </div>

          <div class="form-group">
            <label for="mail">E-Mail</label>
            <input id="mail" name="mail" type="email" placeholder="example@mail.at" required>
          </div>

          <div class="form-group">
            <label for="username">Benutzername</label>
            <input id="username" name="username" type="text" placeholder="Benutzername" required>
          </div>

          <div class="form-group">
            <label for="password">Passwort</label>
            <input id="password" name="password" type="password" placeholder="********" minlength="8" required>
          </div>

          <div class="form-check mt-3 mb-3">
            <input class="form-check-input" type="checkbox" id="agb" required>
            <label class="form-check-label" for="agb">
              Ich akzeptiere die <a href="../html/agb.html" class="text-decoration-none">AGB</a>'s
            </label>
          </div>

<<<<<<< HEAD
          <button class="btn btn-outline-dark border-2 btn-compact me-2" type="submit">Registrierung durchführen</button>

        </div>

      </form>
=======
          <button type="submit" class="regis-btn">Registrierung durchführen</button>
        </form>
      </div>
    </div>
>>>>>>> e4ac21ec29fce050bc3ab5f70dc46d9a3787b2fa
  </main>

  <?php include("../components/footer.php"); ?>

  <script>
    function scrollToTop() {
      window.scrollTo({ top: 0, behavior: 'smooth' });
    }
  </script>
</body>

</html>