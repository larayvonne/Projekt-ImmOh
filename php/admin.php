<?php
session_start();
require_once "../components/dbaccess.php";

// Zugriffsschutz für Admins
if (!isset($_SESSION['user_id']) || $_SESSION['rolle'] !== 'admin') {
  header("Location: index.php?error=unauthorized");
  exit();
}

$message = "";

// Wenn Formular abgeschickt wurde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'] ?? '';
  $beschreibung = $_POST['beschreibung'] ?? '';
  $preis = floatval($_POST['preis']) ?? 0;

  // Bild-Upload vorbereiten
  $bildPfad = null;
  if (isset($_FILES['bild']) && $_FILES['bild']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../resources/shop/'; // Zielordner 
    $bildName = time() . '_' . basename($_FILES['bild']['name']);
    $zielPfad = $uploadDir . $bildName;

    $erlaubteTypen = ['image/jpeg', 'image/png', 'image/gif'];
    if (in_array($_FILES['bild']['type'], $erlaubteTypen)) {
      if (move_uploaded_file($_FILES['bild']['tmp_name'], $zielPfad)) {
        $bildPfad = str_replace('..', '..', $zielPfad); // pfad anpassung
      } else {
        $message = "❌ Fehler beim Speichern des Bildes.";
      }
    } else {
      $message = "❌ Ungültiges Dateiformat. Nur JPG, PNG und GIF erlaubt.";
    }
  }

  // In DB speichern
  if ($name && $beschreibung && $preis > 0 && $bildPfad) {
    $stmt = $conn->prepare("INSERT INTO secondhand (name, beschreibung, preis, bild) VALUES (?, ?, ?, ?)");
    if ($stmt && $stmt->bind_param("ssds", $name, $beschreibung, $preis, $bildPfad) && $stmt->execute()) {
      $message = "✅ Produkt erfolgreich hinzugefügt.";
    } else {
      $message = "❌ Fehler beim Hinzufügen: " . $conn->error;
    }
  } elseif (!$bildPfad && !$message) {
    $message = "❌ Bitte ein Bild hochladen.";
  }
}

      // Produktliste laden
      $secondhandProdukte = [];
      $result = $conn->query("SELECT * FROM secondhand");
      if ($result && $result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $secondhandProdukte[] = $row;
          }
      }

      // Feedback-Meldung aus delete_product.php
      if (isset($_GET['msg'])) {
          switch ($_GET['msg']) {
              case 'deleted':
                  $message = "✅ Produkt erfolgreich gelöscht.";
                  break;
              case 'error':
                  $message = "❌ Fehler beim Löschen.";
                  break;
              case 'invalid':
                  $message = "❌ Ungültiger Löschversuch.";
                  break;
          }
      }


?>

<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssLayout.css">
  <link rel="stylesheet" href="../css/cssAdmin.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<?php include("../components/header.php"); ?>

<body>
  <main>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3 ms-2">
        <li class="breadcrumb-item">
          <a class="text-decoration-none replace-link-dark" href="index.php">
            <i class="fas fa-home"></i> ImmOH!
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Admin</li>
      </ol>
    </nav>

    <div class="container">
      <h1 class="headline text mb-3"> SecondHand-Artikel hinzufügen</h1>

      <?php if ($message): ?>
        <div class="alert <?= str_starts_with($message, '✅') ? 'alert-success' : 'alert-danger' ?>">
          <?= htmlspecialchars($message) ?>
        </div>
      <?php endif; ?>

      <form method="POST" enctype="multipart/form-data" class="bg-light p-4 rounded shadow border border-secondary">
        <div class="text">
          <label for="name" class="form-label">Produktname</label>
          <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="text">
          <label for="beschreibung" class="form-label">Beschreibung</label>
          <textarea name="beschreibung" id="beschreibung" class="form-control" rows="4" required></textarea>
        </div>

        <div class="text">
          <label for="preis" class="form-label">Preis (€)</label>
          <input type="number" name="preis" id="preis" class="form-control" step="0.01" required>
        </div>

        <div class="text">
          <label for="bild" class="form-label">Bild hochladen (JPG, PNG, GIF)</label>
          <input type="file" name="bild" id="bild" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn replace-btn-primary mt-3">
          <i class="fas fa-plus"></i> Produkt hinzufügen</button>
      </form>

    <a href="index.php" class="btn btn-link mt-3 text">
      <i class="fas fa-arrow-left"></i> Zurück zur Startseite
    </a>
  </main>

    <script src="../js/function.js"></script>
    <?php include("../components/footer.php"); ?>

</body>

</html>