<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>docker-lamp</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container my-5">
    <h1>Hura, działa ;)</h1>
    <a href="http://127.0.0.1:1<?= $_SERVER['SERVER_PORT'] ?>">phpMyAdmin</a> |
    <a href="/?info=1">phpinfo()</a>
    <hr>
    <?php
    //These are the defined authentication environment in the db service

    // The MySQL service named in the docker-compose.yml.
    $host = $_ENV['HOSTNAME'] . '-db';

    // Database use name
    $user = 'baza';

    //database user password
    $pass = 'haslo';

    // check the MySQL connection status
    $conn = new mysqli($host, $user, $pass);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    } else {
      echo "Connected to MySQL server successfully!";
    }

    echo ("<hr>");

    print_r("<h2>PHP " . phpversion() . "</h2><code>");

    echo (print_r(get_loaded_extensions(), true));

    echo ("</code><hr>");

    if (isset($_GET['info'])) {
      phpinfo();
    }

    ?>
  </div>
</body>

</html>