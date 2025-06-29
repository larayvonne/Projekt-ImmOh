<?php
require_once "../components/dbaccess.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bauvorhaben</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssLayout.css">
  <link rel="stylesheet" href="../css/cssBauvorhaben.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>

  </style>
</head>

<body class="replace-bg-dark">
  <?php include("../components/header.php"); ?>
  <main>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb mt-3 ms-2">
        <li class="breadcrumb-item">
          <a class="text-decoration-none replace-link-dark replace-text-primary" href="index.php">
            <i class="fas fa-home"></i> ImmOH!
          </a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          Bauvorhaben </li>
      </ol>
    </nav>
    <div class="headline">
      <h1 class="replace-text-primary">Unsere Bauvorhaben – nachhaltig gebaut, lebenswert gestaltet.</h1>
      <p> Wien strebt danach, eine nachhaltige und lebenswerte Stadt zu sein, die ökologische, soziale und
        wirtschaftliche Aspekte miteinander verbindet. Das bedeutet, dass Wien nicht nur versucht, Emissionen zu
        reduzieren und erneuerbare Energien zu nutzen, sondern auch eine Stadt schafft, die für alle Menschen lebenswert
        ist und die Ressourcen schonend behandelt. </p>
      <h4> Jetzt Anteile zum gewünschten Bauvorhaben zu nur 100€/m² sichern! </h4>
      <br>
    </div>

    <div class="box">
      <div class="section reverse">
        <div class="text">
          <h2> Bauvorhaben "Simmering"</h2>
          <p>Inmitten des lebendigen 11. Bezirks, Simmering, entsteht ein modernes und hochwertiges Bauvorhaben, das 20
            frei finanzierte Wohnungen umfasst. Mit einer Wohnfläche von 44 bis 79 m² bieten die Wohnungen vielfältige
            Möglichkeiten für individuelles Wohnen und flexible Raumgestaltungen. Die perfekte Anbindung an öffentliche
            Verkehrsmittel (U3 und diverse Buslinien) sowie die Nähe zu wichtigen infrastrukturellen Einrichtungen wie
            Geschäften des täglichen Bedarfs, Schulen und dem Simmeringer Markt machen dieses Projekt zu einem besonders
            attraktiven Standort. Die ruhige, aber gleichzeitig zentrale Lage ermöglicht es, das urbane Leben in Wien in
            vollen Zügen zu genießen.</p>
          <button class="addToCart button" data-id="5">Jetzt Anteile kaufen</button>
        </div>
        <div class="image">
          <img src="../resources/bau/greenliving.png">
        </div>
      </div>

      <div class="section">
        <div class="text">
          <h2>Bauvorhaben "Gutenberg"</h2>
          <p>In diesem einzigartigen Projekt entstanden 20 frei finanzierte Wohnungen im Herzen des 12. Bezirks. Mit
            Wohnungsgrößen von 44-79 m² bietet es zahlreiche Optionen für ein individuelles Wohnen. Durch die
            ausgezeichnete öffentliche Verkehrsanbindung (U4/U6) und umliegende Infrastruktur (Meidlinger Markt,
            Geschäfte des täglichen Bedarfs, etc.) ist die Immobilie ein attraktiver Standort im Herzen der Stadt Wien.</p>
          <button class="addToCart button" data-id="6">Jetzt Anteile kaufen</button>
        </div>
        <div class="image">
          <img src="../resources/bau/gutenberg.png">
        </div>
      </div>


      <div class="section reverse">
        <div class="text">
          <h2>Bauvorhaben "Mödling" </h2>
          <p>Mit diesem groß angelegten Bauprojekt entstehen 3 moderne Wohnhäuser mit insgesamt 17 frei finanzierten
            Wohnungen in zentraler Lage Mödlings. Die durchdachten Grundrisse von 47-107 m² bieten auf 2 bis 4 Zimmern
            höchstes Wohngefühl. Alle Apartments verfügen über eine Freifläche (Garten/Balkon/Loggia/Terrasse) und haben
            damit entweder direkten Zugang oder Blick ins Grüne. Zusätzlich verfügen jene Wohnungen mit eigenem Garten
            über eine Pergola. Besonders hervorzuheben ist die große Freifläche im Süden des Grundstücks, wo ein
            Erholungsareal für alle Bewohner*innen geschaffen wird.</p>
          <button class="addToCart button" data-id="7">Jetzt Anteile kaufen</button>
        </div>
        <div class="image">
          <img src="../resources/bau/moedling.png">
        </div>
      </div>
    </div>

    <div class="end">
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