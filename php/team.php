<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Team</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssTeam.css">
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
          Team</li>
      </ol>

      <section class="container my-5">
        <h2 class="mb-7">Unser Team – ImmOH</h2>
        <h4 class="mb-5">Gemeinsam für nachhaltiges Wohnen</h4>
        <p>
          Bei <strong>ImmOH</strong> vereinen wir Fachwissen in Immobilienvermittlung mit einer klaren Mission:
          <strong>klimaneutrales Bauen und Wohnen für alle zugänglich machen</strong>. Unser interdisziplinäres Team aus Immobilienprofis, Architekt:innen
          und Nachhaltigkeitsexpert:innen arbeitet Hand in Hand, um Wohnprojekte zu vermitteln, die nicht nur heutigen Ansprüchen genügen –
          sondern auch Verantwortung für morgen übernehmen.
        </p>

        <h5 class="mt-4">Was uns ausmacht:</h5>
        <ul>
          <li>🏡 <strong>Erfahrung in der Gebäudevermittlung:</strong> Persönlich, kompetent und transparent – vom Erstkontakt bis zur Schlüsselübergabe.</li>
          <li>🌍 <strong>Fokus auf Klimaneutralität:</strong> Energieeffiziente Bauweise, Photovoltaik und nachhaltige Materialien sind für uns Standard.</li>
          <li>🤝 <strong>Menschlich und engagiert:</strong> Wir möchten nicht nur Immobilien vermitteln, sondern Lebensräume schaffen.</li>
        </ul>

        <h5 class="mt-4">Unser Versprechen:</h5>
        <p><em>Immobilienvermittlung mit Weitblick – für Menschen, Umwelt und Zukunft.</em></p>
      </section>

      <!--  Team-Sektion -->
      <h3 class="mt-5 mb-4">Unser Team</h3>
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Teammitglied 1 -->
        <div class="col">
          <div class="card h-100 text-center">
            <img src="bilder/team_manuel.jpg" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Manuel Harmer</h5>
              <p class="card-text">Leitung Immobilienvermittlung & CEO <br><small>Gründer der ImmOH! 15+ Jahre Branchenerfahrung, Schwerpunkt Neubauprojekte & Stadtentwicklung.</small></p>
            </div>
          </div>
        </div>

        <!-- Teammitglied 2 -->
        <div class="col">
          <div class="card h-100 text-center">
            <img src="bilder/team_lara.jpg" class="card-img-top">
            <div class="card-body">
              <h5 class="card-title">Lara Yvonne Hanghofer</h5>
              <p class="card-text">Nachhaltigkeitsbeauftragter & CEO <br><small>Gründer der ImmOH! Experte für klimaneutrale Baukonzepte und Förderberatung.</small></p>
            </div>
          </div>
        </div>
  </main>

  <?php include("../components/footer.php"); ?>
  <script src="../js/function.js"></script>

</body>