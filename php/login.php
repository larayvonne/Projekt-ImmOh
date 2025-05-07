<!DOCTYPE html>
<html lang="de">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="icon" type="image/png" href="../resources/immohIcon.png">
  <link rel="stylesheet" href="../css/cssIndex.css">
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
          Login </li>
      </ol>
    </nav>

    <h3>Login</h3>
    <div>
      <label for="user">Benutzername</label>
      <input id="user" name="user" type="text" placeholder="e.g. User123" required>
    </div>
    <div>
      <label for="mail">E-Mail</label>
      <input id="mail" name="mail" type="text" placeholder="e.g. muster@mail.at" required>
    </div>
    <div>
      <label for="password">Passwort</label>
      <input id="password" name="password" type="password" required>
    </div>
    <div>
      <button type="submit">Login</button>
      <button><a href="regis.html">Konto erstellen</a></button>
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