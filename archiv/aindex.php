<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hauptseite</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="resources/immohIcon.png" />
  <link rel="stylesheet" href="../css/cssIndex.css" />
  <link rel="stylesheet" href="../css/cssLayout.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>

<body class="replace-bg-dark">

  <?php include("../components/header.php"); ?>

  <div class="position-relative overflow-hidden">
    <img src="../resources/immoh.webp" class="w-100 h-100 object-fit-cover z-n1" alt="Hintergrundbild">
    <div class="overlay position-absolute top-0 start-0 w-100 h-100"></div>
    <div class="text-container position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-end align-items-center text-center text-white p-3">
      <h5>Verwaltung mit System, Service mit Herz</h5>
      <a class="btn btn-outline-light btn-sm">Mehr Infos</a>
    </div>
  </div>

  <main>
    <div class="hero-section">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis assumenda alias ullam
      qui incidunt, sed dicta error. Nobis, omnis quisquam corrupti unde, minima incidunt, eius et est eligendi vitae mollitia.
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

</body>

</html>