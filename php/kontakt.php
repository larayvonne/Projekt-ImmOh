<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kontakt</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssKontakt.css">
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
          Kontakt </li>
      </ol>
    </nav>
    <div class="ms-3">
      <h1 class="replace-text-primary">Kontakt</h1>
      <br>
      <div>
        <h5 class="replace-text-primary">immOH!</h5>
        <p>Verwaltung mit System, Service mit Herz</p>
        <p class="mb-0">FH Technikum 1200 Wien</p>
        <p class="mb-0">Österreich</p>
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
      </div>
    </div>
    <h3 class="text-center replace-text-primary">So finden Sie uns</h3>
    <iframe class="mx-3"
      src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d153.54051299106976!2d16.37863275089828!3d48.23873332031876!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1sde!2sat!4v1744795879486!5m2!1sde!2sat"
      width="90%" height="30%" style="border:0; margin-bottom: 8rem;" allowfullscreen="" loading="lazy"
      referrerpolicy="no-referrer-when-downgrade">test</iframe>

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
</body>

</html>