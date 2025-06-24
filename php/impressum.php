<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Impressum</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssImpressum.css">
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
          Impressum </li>
      </ol>
    </nav>

    <div class="text-center px-3 px-md-5">
      <h3 class="replace-text-primary text-center mb-3 mt-3">Impressum</h3>
      <div class="text-start">
        <p>Für den Inhalt verantwortlich</p>
        <p class="mb-0">immOH!</p>
        <p class="mb-0">Energie und Gebäudemanagement GmbH</p>
        <p class="mb-0">FH Technikum, 1200 Wien</p>
        <p class="mb-0">Österreich</p>
      </div>
      <table class="table mt-3">
        <tbody>
          <tr>
            <td class="replace-table-info">Fön</td>
            <td class="replace-table-info"><a href="tel:+4301000000">+43 01 00000-0</a></td>
          </tr>
          <tr>
            <td>Fax</td>
            <td>+43 (0)1 11111-22222</td>
          </tr>
          <tr>
            <td class="replace-table-info">E-Mail</td>
            <td class="replace-table-info"><a href="mailto:laramanuel@immoh.at">laramanuel@immoh.at</a></td>
          </tr>
          <tr>
            <td>Web</td>
            <td><a href="index.html">www.immoh.at</a></td>
          </tr>
        </tbody>
      </table>
      <div>
        <p class="text-start mt-5">Rechtsform: Gesellschaft mit beschränkter Haftung</p>
        <table class="table mt-3">
          <tbody>
            <tr>
              <td class="replace-table-info">Firmenbuchnummer</td>
              <td class="replace-table-info">105685w</td>
            </tr>
            <tr>
              <td class="pt-3">Firmenbuchgericht</td>
              <td>Handelsgericht Wien, Gerichtsstand Wien</td>
            </tr>
            <tr>
              <td class="replace-table-info">Kammerzugehörigkeit</td>
              <td class="replace-table-info">Wirtschaftskammer Wien</td>
            </tr>
          </tbody>
        </table>
      </div>
      <br>
      <p class="text-start mb-0">DVR 0695076</p>
      <p class="text-start">UID ATU 14705005</p>
    </div>
  </main>

  <?php include("../components/footer.php"); ?>
  <script src="../js/function.js"></script>

</body>

</html>