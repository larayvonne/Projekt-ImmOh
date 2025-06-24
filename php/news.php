<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>News</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssDatenschutz.css">
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
          News </li>
      </ol>
      <div>
        <section class="container my-5">
          <h2 class="mb-4 replace-text-primary">Aktuelles aus Klimaschutz & Immobilien</h2>

          <div class="row g-4">
            <!-- News 1 -->
            <div class="col-md-6">
              <div class="card">
                <img src="../resources/news/news1.png" class="card-img-top" alt="Klimaneutrale Neubauten">
                <div class="card-body">
                  <h5 class="card-title">Klimaneutrale Neubauten werden Standard ab 2026</h5>
                  <p class="card-text">Ab dem Jahr 2026 sollen alle Neubauten einen klimaneutralen Standard erfüllen. Neue Förderprogramme unterstützen Bauherr:innen auf dem Weg zur CO₂-neutralen Immobilie.</p>
                </div>
              </div>
            </div>

            <!-- News 2 -->
            <div class="col-md-6">
              <div class="card">
                <img src="../resources/news/news2.png" class="card-img-top" alt="Solarpflicht für Neubauten">
                <div class="card-body">
                  <h5 class="card-title">Solarpflicht für Neubaugebiete beschlossen</h5>
                  <p class="card-text">Photovoltaik wird Pflicht: Neubauten in Österreich müssen künftig mit Solaranlagen ausgestattet sein. Ein großer Schritt in Richtung Energiewende im Wohnbau.</p>
                </div>
              </div>
            </div>

            <!-- News 3 -->
            <div class="col-md-6">
              <div class="card">
                <img src="../resources/news/news3.png" class="card-img-top" alt="Holzbauten in Städten">
                <div class="card-body">
                  <h5 class="card-title">Städtischer Wohnbau setzt auf Holz statt Beton</h5>
                  <p class="card-text">In Wien und Graz entstehen neue Wohnbauten komplett aus Holz. Ziel ist die Reduktion von CO₂ in der Bauphase bei gleichzeitig hoher Wohnqualität.</p>
                </div>
              </div>
            </div>

            <!-- News 4 -->
            <div class="col-md-6">
              <div class="card">
                <img src="../resources/news/news4.png" class="card-img-top" alt="Energieeffizienz gefragt">
                <div class="card-body">
                  <h5 class="card-title">Immobilienkäufer fragen verstärkt nach Energieeffizienz</h5>
                  <p class="card-text">Immer mehr Käufer:innen achten auf niedrige Betriebskosten. Immobilien mit guter Energiebilanz, Solartechnik und Wärmepumpe stehen hoch im Kurs.</p>
                </div>
              </div>
            </div>

            <!-- News 5 -->
            <div class="col-md-6">
              <div class="card">
                <img src="../resources/news/news5.png" class="card-img-top" alt="Kooperation mit Klimaschutzagentur">
                <div class="card-body">
                  <h5 class="card-title">ImmOH startet Kooperation mit Klimaschutzagentur</h5>
                  <p class="card-text">Gemeinsam mit der Klimaschutzagentur startet ImmOH eine Initiative zur Förderung klimaneutraler Projekte – mit Beratung direkt ab der Planungsphase.

                  </p>
                </div>
              </div>
            </div>

            <!-- News 6 -->
            <div class="col-md-6">
              <div class="card">
                <img src="../resources/news/news6.png" class="card-img-top" alt="Gründächer in Wien">
                <div class="card-body">
                  <h5 class="card-title">Grüne Dachflächen werden in Wien zur Pflicht für Neubauten</h5>
                  <p class="card-text">
                    Ab 2025 verpflichtet Wien alle Neubauten zur Dachbegrünung. Ziel ist ein besseres Stadtklima, Wasserrückhalt und mehr Biodiversität – ein Gewinn für Stadt & Umwelt.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </section>

      </div>
  </main>

  <?php include("../components/footer.php"); ?>
  <script src="../js/function.js"></script>

</body>

</html>