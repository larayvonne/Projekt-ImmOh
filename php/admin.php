<?php
session_start();
require_once "../components/dbaccess.php";

// Zugriffsschutz für Admins
if (!isset($_SESSION['user_id']) || $_SESSION['rolle'] !== 'admin') {
    header("Location: index.php?error=unauthorized");
    exit();
}

// Nachricht speichern
$message = "";

// Wenn Formular abgeschickt wurde
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $beschreibung = $_POST['beschreibung'] ?? '';
    $preis = floatval($_POST['preis']) ?? 0;

    // Einfacher Insert (bitte später mit Prepared Statements erweitern!)
    $stmt = $conn->prepare("INSERT INTO wohnungen (name, beschreibung, preis) VALUES (?, ?, ?)");
    if ($stmt && $stmt->bind_param("ssd", $name, $beschreibung, $preis) && $stmt->execute()) {
        $message = "✅ Wohnung erfolgreich hinzugefügt.";
    } else {
        $message = "❌ Fehler beim Hinzufügen: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin – Neue Wohnung</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssLayout.css">
</head>

<body class="replace-bg-dark text-white">
  <?php include("../components/header.php"); ?>

  <main class="container mt-5">
    <h1 class="mb-4">🏗 Neue Wohnung hinzufügen</h1>

    <?php if ($message): ?>
      <div class="alert <?= str_starts_with($message, '✅') ? 'alert-success' : 'alert-danger' ?>">
        <?= htmlspecialchars($message) ?>
      </div>
    <?php endif; ?>

    <form method="POST" class="bg-dark p-4 rounded shadow border border-secondary">
      <div class="mb-3">
        <label for="name" class="form-label">Wohnungsname</label>
        <input type="text" name="name" id="name" class="form-control" required>
      </div>

      <div class="mb-3">
        <label for="beschreibung" class="form-label">Beschreibung</label>
        <textarea name="beschreibung" id="beschreibung" class="form-control" rows="4" required></textarea>
      </div>

      <div class="mb-3">
        <label for="preis" class="form-label">Preis pro m² (€)</label>
        <input type="number" name="preis" id="preis" class="form-control" step="0.01" required>
      </div>

      <button type="submit" class="btn btn-success">
        <i class="fas fa-plus"></i> Wohnung hinzufügen
      </button>
    </form>

    <a href="index.php" class="btn btn-link mt-3 text-light">
      <i class="fas fa-arrow-left"></i> Zurück zur Startseite
    </a>
  </main>

  <?php include("../components/footer.php"); ?>
</body>
</html>