<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vielen Dank!</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssLayout.css">
  <link rel="stylesheet" href="../css/cssDanke.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<?php include("../components/header.php"); ?>

<body class="replace-bg-dark">
 <main class="container mt-4 text-white">

  <nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-3 ms-2">
      <li class="breadcrumb-item">
        <a class="text-decoration-none replace-link-dark" href="index.php">
          <i class="fas fa-home"></i> ImmOH!
        </a>
      </li>
      <li class="breadcrumb-item active" aria-current="page">Vielen Dank!</li>
    </ol>
  </nav>

  <div class="headline text">
    <h1 class="replace-text-primary">Vielen Dank für Ihre Bestellung!</h1>
    <p class="text">Ihre Anfrage wurde erfolgreich übermittelt.</p>
  </div>

  <div class="bg-light p-4 rounded border border-light shadow">
    <p class="text">Wir haben Ihre Bestellung erhalten und werden uns in Kürze mit weiteren Informationen bei Ihnen melden.</p>

    <ul class="text ">
      <li>Eine Bestätigung wurde an Ihre E-Mail-Adresse gesendet.</li>
      <li>Unsere Berater prüfen Ihre Auswahl und melden sich zeitnah bei Ihnen.</li>
      <li>Bei Fragen stehen wir Ihnen jederzeit zur Verfügung.</li>
    </ul>

    <p class="text">Vielen Dank, dass Sie sich für <strong>ImmOH!</strong> entschieden haben. Gemeinsam bauen wir nachhaltig an Ihrer Zukunft.</p>

    <a href="index.php" class="btn btn-outline mt-4">
      <i class="fas fa-arrow-left text"></i> Zurück zur Startseite
    </a>
  </div>

</main>

  <?php include("../components/footer.php"); ?>
  <script src="../js/function.js"></script>
</body>
</html>