<?php
  // Pour l'authentification Google
  require_once '../../php-files/auth/config.php';
  require '../../php-files/base/config.php'
?>

<!DOCTYPE html>
<html>
  <head>

  </head>

  <body>

    <h1>Connexion</h1>

    <a href="../../php-files/auth/login-google.php?prev=<?= urlencode($_SERVER['REQUEST_URI']) ?>">Connexion Google</a>
    <a href="../../php-files/auth/logout.php?prev=<?= urlencode($_SERVER['REQUEST_URI']) ?>">Déconnexion</a>

    <?php
      if ($_SESSION['logged'] === true) {
        echo "<p>Connecté (".$_SESSION['email'].")</p>";
      }

    ?>

  </body>

</html>
