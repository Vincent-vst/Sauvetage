<?php
  require_once '../php-files/auth/config.php';
?>

<!DOCTYPE html>
<html>
  <head>

  </head>

  <body>

    <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=email&access_type=online&response_type=code&redirect_uri=<?= GOOGLE_AUTH_URI ?>&client_id=<?= GOOGLE_AUTH_ID ?>">Connection Google</a>

  </body>

</html>
