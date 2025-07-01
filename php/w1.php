<?php
require "../components/dbaccess.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wohnungen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
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
          <a class="text-decoration-none replace-link-dark " href="index.php">
            <i class="fas fa-home"></i> ImmOH!
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Klima-Wohnung 1</li>
      </ol>
    </nav>
    <div class="headline">
      <h1 class="replace-text-primary">Familienwohnung mit Gartenzugang</h1>
      <p>Leistbares und umweldfreundliches Wohnen, damit Sie im Altag Gutes für die Umwelt und Ihre Geldbörse tun. </p>
        
        <h3>Highlights der Wohnung:</h3>
       
          <p>Großzügiger Wohn-Essbereich mit offener Küche – viel Platz für gemeinsame Zeit</p>
          <p>Drei Schlafzimmer – perfekt für Kinder, Gäste oder ein ruhiges Homeoffice</p>
          <p>Direkter Zugang zum privaten Gartenanteil – genießen Sie Ihre grüne Oase direkt vor der Tür</p>
          <p>Barrierefrei und in hochwertiger Holzbauweise errichtet – modern, nachhaltig und komfortabel</p>
          <p>Kindergarten und Schule sind in wenigen Gehminuten erreichbar – kurze Wege für den Alltag</p>
          <p>Effiziente Energieversorgung durch Fernwärme und Solarenergie – niedrige Betriebskosten inklusive</p>
        

        <p><strong>💰 Kaufpreis:</strong> ab € 1.250,- / m²<br>
          <strong>📐 Gesamtfläche:</strong> 95 m²<br>
          <strong>🚪 Zimmer:</strong> 4 (inkl. 3 Schlafzimmer)<br>
          <strong>🌳 Privater Gartenanteil</strong><br>
          <strong>♿ Barrierefrei</strong><br>
          <strong>🔆 Nachhaltige Bauweise & Energieversorgung</strong>
        </p>

        <p>📞 Kontaktieren Sie uns für weitere Informationen oder einen Besichtigungstermin!</p>
        </div>
      </div>
    </div>

      <div class="end">
        <h2>Ein nachhaltiger Stadtteil für Wien </h2>
        <div class="container end">
          <div class="row row-cols-1 row-cols-md-3">
            <div class="col">
              <h5><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-tree" viewBox="0 0 16 16">
                  <path d="M8.416.223a.5.5 0 0 0-.832 0l-3 4.5A.5.5 0 0 0 5 5.5h.098L3.076 8.735A.5.5 0 0 0 3.5 9.5h.191l-1.638 3.276a.5.5 0 0 0 .447.724H7V16h2v-2.5h4.5a.5.5 0 0 0 .447-.724L12.31 9.5h.191a.5.5 0 0 0 .424-.765L10.902 5.5H11a.5.5 0 0 0 .416-.777zM6.437 4.758A.5.5 0 0 0 6 4.5h-.066L8 1.401 10.066 4.5H10a.5.5 0 0 0-.424.765L11.598 8.5H11.5a.5.5 0 0 0-.447.724L12.69 12.5H3.309l1.638-3.276A.5.5 0 0 0 4.5 8.5h-.098l2.022-3.235a.5.5 0 0 0 .013-.507" />
                </svg>
                Nachhaltige Materialien</h5>
              <p>Verwendung von Holz, Lehm, Ziegeln und anderen Naturbaustoffen, die wenig Energie bei der Herstellung verbrauchen und gut recycelt werden können.</p>
            </div>
            <div class="col">
              <h5><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                  <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
                </svg>
                Energieeffizienz</h5>
              <p>Optimale Wärmedämmung, Nutzung passiver Solarwärme und Installation erneuerbarer Energien wie Solar- oder Wärmepumpen.</p>
            </div>
            <div class="col">
              <h5><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-houses" viewBox="0 0 16 16">
                  <path d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207z" />
                </svg>
                Ganzheitliche Betrachtung</h5>
              <P>Berücksichtigung der gesamten Lebensdauer eines Gebäudes, von der Planung bis zur Entsorgung, und Optimierung von Ressourcenverbrauch, Flächennutzung und CO2-Ausstoß.</P>
            </div>
          </div>
        </div>
  </main>

  <?php include("../components/footer.php"); ?>
  <script src="../js/function.js"></script>

</body>

</html>