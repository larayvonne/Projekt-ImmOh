
<?php
session_start();
require_once "../components/dbaccess.php";

// Warenkorb laden
$cart = $_SESSION['cart'] ?? [];
if (isset($_SESSION['user_id'])) {
    $uid = (int)$_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT item_id, name, description, price, quantity FROM cart_items WHERE user_id = ?");
    if ($stmt) {
        $stmt->bind_param("i", $uid);
        $stmt->execute();
        $result = $stmt->get_result();
        $cart = [];
        while ($row = $result->fetch_assoc()) {
            $cart[$row['item_id']] = [
                'id' => $row['item_id'],
                'name' => $row['name'],
                'description' => $row['description'],
                'price' => (float)$row['price'],
                'qty' => (int)$row['quantity']
            ];
        }
        $stmt->close();
    }
}

$vatRate = 0.20; // Mehrwertsteuer Immobilien
$subtotal = 0;
foreach ($cart as $item) {
    $subtotal += $item['price'] * $item['qty'];
}
$tax = $subtotal * $vatRate;
$total = $subtotal + $tax;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($cart)) {
    $payment = $_POST['payment'] ?? 'karte';
     $iban    = $_POST['iban'] ?? '';
    $bic     = $_POST['bic'] ?? '';
    // Rechnungsdetails erstellen
    $invoice  = "Vielen Dank fuer Ihre Bestellung bei ImmOH!\n\n";
    $invoice .= "Produkte:\n";
    foreach ($cart as $item) {
        $sum = $item['price'] * $item['qty'];
        $invoice .= sprintf("%s x%d - %.2f EUR\n", $item['name'], $item['qty'], $sum);
    }
    $invoice .= sprintf("\nZwischensumme: %.2f EUR", $subtotal);
    $invoice .= sprintf("\nMwSt (%.0f%%): %.2f EUR", $vatRate*100, $tax);
    $invoice .= sprintf("\nGesamt: %.2f EUR", $total);
    $invoice .= "\nZahlungsart: " . $payment;
    if (!empty($iban)) {
        $invoice .= "\nIBAN: $iban";
    }
    if (!empty($bic)) {
        $invoice .= "\nBIC: $bic";
    }
    $invoice .= "\n"; // code für bestätigungsmail hinfällig da kein live
    if (isset($_SESSION['user_email'])) {
        $to = $_SESSION['user_email'];
        $subject = 'Ihre Bestellung bei ImmOH';
        $headers = 'From: noreply@immoh.at';
        @mail($to, $subject, $invoice, $headers);
    }
    $_SESSION['invoice_data'] = [
        'cart'     => $cart,
        'subtotal' => $subtotal,
        'tax'      => $tax,
        'total'    => $total,
        'payment'  => $payment,
        'iban'     => $iban,
        'bic'      => $bic
    ];

    // Warenkorb leeren
    $_SESSION['cart'] = [];
    if (isset($_SESSION['user_id'])) {
        $stmt = $conn->prepare('DELETE FROM cart_items WHERE user_id = ?');
        if ($stmt) {
            $stmt->bind_param('i', $uid);
            $stmt->execute();
            $stmt->close();
        }
    }
    $_SESSION['meldung'] = 'Bestellung abgeschlossen. Eine Rechnung wurde per E-Mail gesendet.';
    header('Location: rechnung.php');
    exit;
}
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
          <a class="text-decoration-none replace-link-dark" href="index.php">
            <i class="fas fa-home"></i> ImmOH!
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Kassa </li>
      </ol>
    </nav>

    <?php if (empty($cart)): ?>
      <p>Ihr Warenkorb ist leer.</p>
    <?php else: ?>
      <h2>Übersicht</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Produkt</th>
            <th>Menge</th>
            <th>Preis</th>
            <th>Summe</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($cart as $item): $sum = $item['price'] * $item['qty']; ?>
          <tr>
            <td><?= htmlspecialchars($item['name']) ?></td>
            <td><?= (int)$item['qty'] ?></td>
            <td>€<?= number_format($item['price'], 2, ',', '.') ?></td>
            <td>€<?= number_format($sum, 2, ',', '.') ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3" class="text-end">Zwischensumme:</th>
            <td>€<?= number_format($subtotal, 2, ',', '.') ?></td>
          </tr>
          <tr>
            <th colspan="3" class="text-end">Immonilienabgabe (<?= $vatRate*100 ?>%):</th>
            <td>€<?= number_format($tax, 2, ',', '.') ?></td>
          </tr>
          <tr>
            <th colspan="3" class="text-end">Gesamt:</th>
            <td>€<?= number_format($total, 2, ',', '.') ?></td>
          </tr>
        </tfoot>
      </table>

  <form method="post">
        <div class="mb-3">
          <label class="form-label">Zahlungsart:</label><br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="payment" id="paycard" value="bankomatkarte" checked>
            <label class="form-check-label" for="paycard">Bankomatkarte</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="payment" id="payinvoice" value="rechnung">
            <label class="form-check-label" for="payinvoice">Rechnung</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="payment" id="paypaypal" value="paypal">
            <label class="form-check-label" for="paypaypal">PayPal</label>
          </div>
           <div id="bank-data" class="mt-3" style="display:none;">
            <div class="mb-2">
              <label for="iban" class="form-label">IBAN</label>
              <input type="text" class="form-control" id="iban" name="iban" placeholder="AT00 0000 0000 0000 0000">
            </div>
            <div class="mb-2">
              <label for="bic" class="form-label">BIC</label>
              <input type="text" class="form-control" id="bic" name="bic" placeholder="BIC">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Bestellung abschließen</button>
      </form>
    <?php endif; ?>
  </main>
<?php include("../components/footer.php"); ?>
<script src="../js/function.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const invoiceRadio = document.getElementById('payinvoice');
    const cardRadio = document.getElementById('paycard');
    const paypalRadio = document.getElementById('paypaypal');
    const bankData = document.getElementById('bank-data');
    function toggleBank() {
      bankData.style.display = invoiceRadio.checked ? 'block' : 'none';
    }
    invoiceRadio.addEventListener('change', toggleBank);
    cardRadio.addEventListener('change', toggleBank);
    paypalRadio.addEventListener('change', toggleBank);
    toggleBank();
  });
</script>
</body>
</html>