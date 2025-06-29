<?php
session_start();
require_once "../components/dbaccess.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $zahlungsmethode = $_POST['zahlungsmethode'] ?? '';
    $iban = $_POST['iban'] ?? '';

    // Beispiel: hier könntest du alles in DB speichern

    $_SESSION['cart'] = []; // Warenkorb leeren
    header('Location: danke.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kassa – ImmOH!</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssLayout.css">
  <link rel="stylesheet" href="../css/cssKassa.css">
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
        <li class="breadcrumb-item active" aria-current="page">Kassa</li>
      </ol>
    </nav>

    <div class="headline mb-4">
      <h1 class="replace-text-primary">🧾 Kassa – Bestellung abschließen</h1>
      <p>Bitte geben Sie Ihre Daten ein und wählen Sie eine Zahlungsmethode.</p>
    </div>

    <form method="POST" class="bg-dark p-4 rounded border border-light shadow" id="checkoutForm">
      <div class="mb-3">
        <label for="name" class="form-label">Name*</label>
        <input type="text" class="form-control" id="name" name="name" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">E-Mail-Adresse*</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>

      <div class="mb-3">
        <label class="form-label">Zahlungsmethode*</label>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="zahlungsmethode" id="bank" value="Banküberweisung" required>
          <label class="form-check-label" for="bank">Banküberweisung</label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="zahlungsmethode" id="rechnung" value="Rechnung" required>
          <label class="form-check-label" for="rechnung">Kauf auf Rechnung</label>
        </div>
      </div>

      <div class="mb-3" id="ibanField" style="display: none;">
        <label for="iban" class="form-label">IBAN*</label>
        <input type="text" class="form-control" id="iban" name="iban" placeholder="DE00 1234 5678 9000 0000 00">
      </div>

      <button type="submit" class="btn btn-success w-100">
        <i class="fas fa-check-circle"></i> Zahlungspflichtig bestellen
      </button>
    </form>

    <a href="cart.php" class="btn btn-outline-light mt-3">← Zurück zum Warenkorb</a>
  </main>

  <?php include("../components/footer.php"); ?>

  <script>
    // IBAN-Feld nur zeigen bei "Banküberweisung"
    document.querySelectorAll('input[name="zahlungsmethode"]').forEach(input => {
      input.addEventListener('change', function () {
        const ibanField = document.getElementById('ibanField');
        ibanField.style.display = this.value === 'Banküberweisung' ? 'block' : 'none';
        document.getElementById('iban').required = (this.value === 'Banküberweisung');
      });
    });

    // Bestätigungs-Popup bei Abschicken
    document.getElementById('checkoutForm').addEventListener('submit', function (e) {
  const confirmed = confirm('Möchten Sie die Bestellung verbindlich abschicken?');
  if (!confirmed) {
    e.preventDefault(); // wird NICHT abgeschickt
    window.location.href = 'Kassa.php'; // auf seite bleiben
      }
    });
  </script>
</body>
</html>