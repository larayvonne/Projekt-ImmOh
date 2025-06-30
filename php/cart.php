<?php
session_start();
require_once "../components/dbaccess.php";

// Produkt entfernen (Typ und ID müssen mitgegeben werden!)
if (isset($_GET['remove']) && isset($_GET['type'])) {
    $type = $_GET['type'];
    $id = intval($_GET['remove']);
    unset($_SESSION['cart'][$type][$id]);
    header("Location: cart.php");
    exit;
}

$cart = $_SESSION['cart'] ?? [];
$products = [];
$total = 0;

// Hilfsfunktion zum Laden aus Tabellen mit individuellen ID-Feldern
function ladeProdukte($conn, $tabelle, $idSpalte, $cartTeilstück, $typ) {
    $daten = [];
    $ids = implode(',', array_map('intval', array_keys($cartTeilstück)));
    if (!$ids) return [];

    $sql = "SELECT $idSpalte, name, beschreibung, preis FROM $tabelle WHERE $idSpalte IN ($ids)";
    $result = $conn->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $produktId = $row[$idSpalte];
            $menge = $cartTeilstück[$produktId] ?? 1;
            $daten[] = [
                'id' => $produktId,
                'name' => $row['name'],
                'beschreibung' => $row['beschreibung'],
                'preis' => $row['preis'],
                'quantity' => $menge,
                'subtotal' => $menge * $row['preis'],
                'type' => $typ
            ];
        }
    }
    return $daten;
}

// Wohnungen laden
if (!empty($cart['wohnungen'])) {
    $products = array_merge($products, ladeProdukte($conn, 'wohnungen', 'wohnung_id', $cart['wohnungen'], 'wohnungen'));
}

// Secondhand-Produkte laden
if (!empty($cart['secondhand'])) {
    $products = array_merge($products, ladeProdukte($conn, 'secondhand', 'second_id', $cart['secondhand'], 'secondhand'));
}

// Gesamtsumme berechnen
foreach ($products as $p) {
    $total += $p['subtotal'];
}
?>

<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Warenkorb</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssLayout.css">
  <link rel="stylesheet" href="../css/cssCart.css">
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
        <li class="breadcrumb-item active" aria-current="page">Warenkorb</li>
      </ol>
    </nav>

    <div class="headline">
      <h1 class="replace-text-primary"> Dein Warenkorb</h1>
      <p class="text">Hier findest du alle Wohnungen, die du vorgemerkt hast.</p>
    </div>
    <?php if (empty($products)): ?>
      <div class="alert alert-warning text">Dein Warenkorb ist leer.</div>
    <?php else: ?>
      <table class="table ">
        <thead>
          <tr>
            <th>Typ</th>
            <th>Name</th>
            <th>Beschreibung</th>
            <th>Menge</th>
            <th>Preis</th>
            <th>Zwischensumme</th>
            <th>Entfernen</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($products as $product): ?>
            <tr>
              <td><?= ucfirst($product['type']) ?></td>
              <td><?= htmlspecialchars($product['name']) ?></td>
              <td><?= htmlspecialchars($product['beschreibung']) ?></td>
              <td><?= $product['quantity'] ?></td>
              <td>€<?= number_format($product['preis'], 2, ',', '.') ?></td>
              <td>€<?= number_format($product['subtotal'], 2, ',', '.') ?></td>
              <td>
                <a href="cart.php?remove=<?= $product['id'] ?>&type=<?= $product['type'] ?>" class="btn btn-sm btn-danger">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <p class="text">Gesamtsumme: <strong>€<?= number_format($total, 2, ',', '.') ?></strong></p>
      <a href="kassa.php" class="btn btn-success">Zur Kassa gehen</a>
    <?php endif; ?>

  </main>

  <?php include("../components/footer.php"); ?>
  <script src="../js/function.js"></script>
</body>
</html>