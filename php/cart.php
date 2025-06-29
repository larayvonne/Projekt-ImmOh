<?php
session_start();
require_once "../components/dbaccess.php";

$cart = $_SESSION['cart'] ?? [];
$products = [];

if (!empty($cart)) {
    $ids = implode(',', array_map('intval', array_keys($cart)));
    $sql = "SELECT id, name, beschreibung, preis_pro_m2 FROM wohnungen WHERE id IN ($ids)";
    $result = $db_obj->query($sql);

    while ($row = $result->fetch_assoc()) {
        $row['quantity'] = $cart[$row['id']];
        $products[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <title>Warenkorb</title>
  <link rel="stylesheet" href="../css/cssLayout.css">
</head>
<body>
  <h1>🛒 Dein Warenkorb</h1>
  <a href="wohnungen.php">← Zurück</a>

  <?php if (empty($products)): ?>
    <p>Dein Warenkorb ist leer.</p>
  <?php else: ?>
    <ul>
      <?php
        $total = 0;
        foreach ($products as $product):
            $subtotal = $product['preis_pro_m2'] * $product['quantity'];
            $total += $subtotal;
      ?>
        <li>
          <?= htmlspecialchars($product['name']) ?> (<?= $product['beschreibung'] ?>) <br>
          Menge: <?= $product['quantity'] ?> x €<?= number_format($product['preis_pro_m2'], 2, ',', '.') ?> = 
          <strong>€<?= number_format($subtotal, 2, ',', '.') ?></strong>
        </li>
      <?php endforeach; ?>
    </ul>
    <p><strong>Gesamtsumme: €<?= number_format($total, 2, ',', '.') ?></strong></p>
  <?php endif; ?>
</body>
</html>