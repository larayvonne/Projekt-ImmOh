<?php 
session_start();
require_once "../components/dbaccess.php";

// Admin-Zugriff prüfen
$isAdmin = isset($_SESSION['rolle']) && $_SESSION['rolle'] === 'admin';

// Produkt aus Formular hinzufügen
if (
  $isAdmin &&
  $_SERVER['REQUEST_METHOD'] === 'POST' &&
  isset($_POST['add_product'])
) {
  $name = $_POST['name'] ?? '';
  $beschreibung = $_POST['beschreibung'] ?? '';
  $bild_url = $_POST['bild_url'] ?? '';
  $preis = floatval($_POST['preis'] ?? 0);

  if ($name && $bild_url && $preis > 0) {
    $stmt = $conn->prepare("INSERT INTO secondhand (name, beschreibung, preis, bild) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssds", $name, $beschreibung, $preis, $bild_url);
    $stmt->execute();
    $successMessage = "Produkt erfolgreich hinzugefügt.";
  }
}

// Warenkorb-Funktion
if (isset($_GET['add_to_cart'])) {
  $productId = intval($_GET['add_to_cart']);
  $prev = isset($_SESSION['cart'][$productId]) && is_numeric($_SESSION['cart'][$productId]) ? $_SESSION['cart'][$productId] : 0;
  $_SESSION['cart'][$productId] = $prev + 1;
}

// SecondHand-Produkte laden
$result = $conn->query("SELECT * FROM secondhand");
$produkte = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
?>

<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SecondHand</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssLayout.css">
  <link rel="stylesheet" href="../css/cssWohnungen.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="replace-bg-dark">
<?php include("../components/header.php"); ?>

<main class="container mt-4 text-white">
  <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a class="text-decoration-none" href="index.php"><i class="fas fa-home"></i> ImmOH!</a></li>
      <li class="breadcrumb-item active">SecondHand</li>
    </ol>
  </nav>

  <div class="headline mb-4">
    <h1 class="replace-text-primary">ImmOH! SecondHand – Nachhaltig einrichten</h1>
    <p>Wiederverwenden statt wegwerfen: Möbel und Ausstattung für Ihre Wohnung.</p>
  </div>

  <?php if ($isAdmin): ?>
    <div class="bg-light text-dark p-4 rounded mb-5">
      <h4>Admin: Neues SecondHand-Produkt hinzufügen</h4>

      <?php if (isset($successMessage)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($successMessage) ?></div>
      <?php endif; ?>

      <form method="POST">
        <input type="hidden" name="add_product" value="1">
        <div class="mb-2">
          <label>Name:</label>
          <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-2">
          <label>Beschreibung:</label>
          <textarea name="beschreibung" class="form-control" required></textarea>
        </div>
        <div class="mb-2">
          <label>Bild-URL:</label>
          <input type="text" name="bild_url" class="form-control" required>
        </div>
        <div class="mb-3">
          <label>Preis in Euro:</label>
          <input type="number" step="0.01" name="preis" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Hinzufügen</button>
      </form>
    </div>
  <?php endif; ?>

  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php foreach ($produkte as $prod): ?>
      <div class="col">
        <div class="card h-100">
          <img src="<?= htmlspecialchars($prod['bild']) ?>" class="card-img-top" alt="Produktbild">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($prod['name']) ?></h5>
            <p class="card-text"><?= htmlspecialchars($prod['beschreibung']) ?></p>
            <p class="fw-bold">€<?= number_format($prod['preis'], 2, ',', '.') ?></p>
            <a href="?add_to_cart=<?= $prod['id'] ?>" class="btn btn-primary">Zum Warenkorb hinzufügen</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</main>

<?php include("../components/footer.php"); ?>
<script src="../js/cart_shop.js"></script>
</body>
</html>