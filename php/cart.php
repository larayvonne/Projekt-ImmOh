<?php
session_start();
require_once "../components/dbaccess.php";

// Produkt entfernen
if (isset($_GET['remove'])) {
    $removeId = intval($_GET['remove']);
    unset($_SESSION['cart'][$removeId]);
    header("Location: cart.php"); // vermeidet erneutes Entfernen bei Reload
    exit;
}

$cart = $_SESSION['cart'] ?? [];
$products = [];

if (!empty($cart)) {
    $ids = implode(',', array_map('intval', array_keys($cart)));
    $sql = "SELECT id, name, beschreibung, preis FROM wohnungen WHERE id IN ($ids)";
    $result = $conn->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $row['quantity'] = $cart[$row['id']] ?? 1;
            $products[] = $row;
        }
    }
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
  <link rel="stylesheet" href="../css/cssWohnungen.css">
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
      <p class="mb-4">Hier findest du alle Wohnungen, die du vorgemerkt hast.</p>
    </div>

    <?php if (empty($products)): ?>
      <div class="alert alert-warning text-dark">Dein Warenkorb ist leer.</div>
    <?php else: ?>
      <table class="table"> 
        <thead>
          <tr>
            <th>Wohnung</th>
            <th>Beschreibung</th>
            <th>Menge</th>
            <th>Preis</th>
            <th>Zwischensumme</th>
            <th>Entfernen</th>
          </tr>
        </thead>
        <tbody>
          <?php $total = 0; ?>
          <?php foreach ($products as $product): ?>
            <?php
              $subtotal = $product['preis'] * $product['quantity'];
              $total += $subtotal;
            ?>
            <tr>
              <td><?= htmlspecialchars($product['name']) ?></td>
              <td><?= htmlspecialchars($product['beschreibung']) ?></td>
              <td><?= $product['quantity'] ?></td>
              <td>€<?= number_format($product['preis'], 2, ',', '.') ?></td>
              <td>€<?= number_format($subtotal, 2, ',', '.') ?></td>
              <td>
                <a href="cart.php?remove=<?= $product['id'] ?>" class="btn btn-sm " title="Entfernen">
                  <i class="fas fa-trash-alt"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>

      <p class="fs-4">Gesamtsumme: <strong>€<?= number_format($total, 2, ',', '.') ?></strong></p>

      <a href="kassa.php" class="btn btn-success ms-2">Zur Kassa gehen</a>
    <?php endif; ?>

  </main>

  <?php include("../components/footer.php"); ?>
</body>
</html>