<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Warenkorb</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssDatenschutz.css">
  <link rel="stylesheet" href="../css/cssLayout.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<body class="replace-bg-dark">

  <?php
  include("../components/header.php");
  $cart = $_SESSION['cart'] ?? [];
  ?>

  <main>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3 ms-2">
        <li class="breadcrumb-item">
          <a class="text-decoration-none replace-link-dark" href="index.html">
            <i class="fas fa-home"></i> ImmOH!
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Warenkorb</li>
      </ol>
    </nav>
    <div class="container py-4">
      <h2>Warenkorb</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Anteile</th>
            <th>Beschreibung</th>
            <th>Preis</th>
            <th>Summe</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php $total = 0;
          foreach ($cart as $item): $sum = $item['price'] * $item['qty'];
            $total += $sum; ?>
            <tr>
              <td><?= htmlspecialchars($item['name']) ?></td>
              <td><?= (int)$item['qty'] ?></td>
              <td><?= htmlspecialchars($item['description']) ?></td>
              <td>€<?= number_format($item['price'], 2, ',', '.') ?></td>
              <td>€<?= number_format($sum, 2, ',', '.') ?></td>
              <td><button class="btn btn-sm btn-danger removeFromCart" data-id="<?= htmlspecialchars($item['id']) ?>">Entfernen</button></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
        <tfoot>
          <tr>
            <th colspan="3" class="text-end">Gesamt:</th>
            <th id="cart-total">€<?= number_format($total, 2, ',', '.') ?></th>
            <th></th>
          </tr>
        </tfoot>
      </table>
      <div class="text-end">
        <button class="btn btn-primary" <?= empty($cart) ? 'disabled' : '' ?>>Zur Kasse</button>
      </div>
    </div>
  </main>

  <?php include("../components/footer.php"); ?>

  <script>
    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }
  </script>
  <script src="../js/cart.js"></script>
</body>

</html>