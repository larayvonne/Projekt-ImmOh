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
                <button class="btn btn-primary addToCart" data-id="<?= $produkt['second_id'] ?>">
  Zum Warenkorb hinzufügen
</button>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>

     <div class="end">
      <h2>Ein nachhaltiger Stadtteil für Wien </h2>
      <div class="container end">
        <div class="row row-cols-1 row-cols-md-3">
          <div class="col">
            <h5><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-tree"
                viewBox="0 0 16 16">
                <path
                  d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507" />
              </svg>
              Nachhaltige Materialien</h5>
            <p>Verwendung von Holz, Lehm, Ziegeln und anderen Naturbaustoffen, die wenig Energie bei der Herstellung
              verbrauchen und gut recycelt werden können.</p>
          </div>
          <div class="col">
            <h5><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                class="bi bi-brightness-high" viewBox="0 0 16 16">
                <path
                  d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
              </svg>
              Energieeffizienz</h5>
            <p>Optimale Wärmedämmung, Nutzung passiver Solarwärme und Installation erneuerbarer Energien wie Solar- oder
              Wärmepumpen.</p>
          </div>
          <div class="col">
            <h5><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-houses"
                viewBox="0 0 16 16">
                <path
                  d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207z" />
              </svg>
              Ganzheitliche Betrachtung</h5>
            <p>Berücksichtigung der gesamten Lebensdauer eines Gebäudes, von der Planung bis zur Entsorgung, und
              Optimierung von Ressourcenverbrauch, Flächennutzung und CO2-Ausstoß.</p>
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