<?php
session_start();
require_once "../components/dbaccess.php";

// Produkte laden
$secondhandProdukte = [];
$result = $conn->query("SELECT * FROM secondhand");
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $secondhandProdukte[] = $row;
    }
}

// Produkte aus DB laden 
$secondhandProdukte = [];
$result = $conn->query("SELECT * FROM secondhand");
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $secondhandProdukte[] = $row;
    }
}


?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SecondHand</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssLayout.css">
  <link rel="stylesheet" href="../css/cssWohnungen.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>

<?php include("../components/header.php"); ?>

<body class="replace-bg-dark">
  <main>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3 ms-2">
        <li class="breadcrumb-item">
          <a class="text-decoration-none replace-link-dark" href="index.php">
            <i class="fas fa-home"></i> ImmOH!
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">SecondHand</li>
      </ol>
    </nav>

    <div class="headline">
      <h1 class="replace-text-primary">ImmOH! KlimaWohnungen - nachhaltig und günstig wohnen</h1>
      <p>Leistbares und umweltfreundliches Wohnen, damit Sie im Alltag Gutes für die Umwelt und Ihre Geldbörse tun.</p>
      <br>
    </div>

    <div class="container text-center">
      <div class="row">
        <?php foreach ($secondhandProdukte as $produkt): ?>
          <?php
            $bildPfad = !empty($produkt['bild']) && file_exists($produkt['bild']) 
              ? htmlspecialchars($produkt['bild']) 
              : '../resources/platzhalter.png';
            $name = htmlspecialchars($produkt['name']);
          ?>
          <div class="col mb-4">
            <div class="card" style="width: 18rem;">
              <img src="<?= $bildPfad ?>" class="card-img-top" alt="<?= $name ?>">
              <div class="card-body">
                <h5 class="card-title"><?= $name ?></h5>
                <p class="card-text"><?= htmlspecialchars($produkt['beschreibung']) ?></p>
                <p class="card-text"><strong>€<?= number_format($produkt['preis'], 2, ',', '.') ?></strong></p>
                <button class="btn replace-btn-primary addToCart" data-id="<?= $produkt['second_id'] ?>">Zum Warenkorb hinzufügen</button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div class="end mt-5">
      <h2>Ein nachhaltiger Stadtteil für Wien</h2>
      <div class="container">
        <div class="row row-cols-1 row-cols-md-3">
          <div class="col">
            <h5><i class="bi bi-tree"></i> Nachhaltige Materialien</h5>
            <p>Verwendung von Holz, Lehm, Ziegeln und anderen Naturbaustoffen mit niedrigem Energieverbrauch und guter Recycelbarkeit.</p>
          </div>
          <div class="col">
            <h5><i class="bi bi-brightness-high"></i> Energieeffizienz</h5>
            <p>Optimale Wärmedämmung, passive Solarwärme und Einsatz erneuerbarer Energiequellen wie Solar- oder Wärmepumpen.</p>
          </div>
          <div class="col">
            <h5><i class="bi bi-houses"></i> Ganzheitliche Betrachtung</h5>
            <p>Berücksichtigung der gesamten Lebensdauer eines Gebäudes und Optimierung von Ressourcen, Fläche und CO₂-Ausstoß.</p>
          </div>
        </div>
      </div>
    </div>
  </main>

  <?php include("../components/footer.php"); ?>
  <script src="../js/cart_shop.js"></script>
  <script src="../js/function.js"></script>
</body>
</html>