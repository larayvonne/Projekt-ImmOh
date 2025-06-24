<?php
session_start();
require_once "../components/dbaccess.php";

if (!isset($_SESSION['invoice_data'])) {
    echo "Keine Rechnungsdaten vorhanden.";
    exit;
}

$data = $_SESSION['invoice_data'];
$cart = $data['cart'];
$subtotal = $data['subtotal'];
$tax = $data['tax'];
$total = $data['total'];
$payment = $data['payment'];
$iban = $data['iban'] ?? '';
$bic = $data['bic'] ?? '';
?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kassa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssKassa.css">
  <link rel="stylesheet" href="../css/cssLayout.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="replace-bg-dark">
  <?php include("../components/header.php"); ?>

  <main>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3 ms-2">
        <li class="breadcrumb-item">
          <a class="text-decoration-none replace-link-dark" href="index.html">
            <i class="fas fa-home"></i> ImmOH!
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Rechnung </li>
      </ol>
    </nav>
    <h2>Rechnung – ImmOH</h2>
    <p>Vielen Dank für Ihre Bestellung!</p>

    <table>
        <thead>
            <tr>
                <th>Produkt</th>
                <th>Menge</th>
                <th>Einzelpreis</th>
                <th>Gesamt</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cart as $item): 
                $sum = $item['price'] * $item['qty']; ?>
                <tr>
                    <td><?= htmlspecialchars($item['name']) ?></td>
                    <td><?= $item['qty'] ?></td>
                    <td><?= number_format($item['price'], 2, ',', '.') ?> EUR</td>
                    <td><?= number_format($sum, 2, ',', '.') ?> EUR</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="summary">
        <p><strong>Zwischensumme (exkl. MwSt):</strong> <?= number_format($subtotal, 2, ',', '.') ?> EUR</p>
        <p><strong>Enthaltene MwSt (20%):</strong> <?= number_format($tax, 2, ',', '.') ?> EUR</p>
        <p><strong>Gesamtbetrag (inkl. MwSt):</strong> <?= number_format($total, 2, ',', '.') ?> EUR</p>
        <p><strong>Zahlungsart:</strong> <?= htmlspecialchars($payment) ?></p>
        <?php if (!empty($iban)): ?>
            <p><strong>IBAN:</strong> <?= htmlspecialchars($iban) ?></p>
        <?php endif; ?>
        <?php if (!empty($bic)): ?>
            <p><strong>BIC:</strong> <?= htmlspecialchars($bic) ?></p>
        <?php endif; ?>
    </div>
  </main>
<?php include("../components/footer.php"); ?>
<script src="../js/function.js"></script>
</body>
</html>