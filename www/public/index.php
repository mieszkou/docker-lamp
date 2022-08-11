<a href="http://127.0.0.1:<?= $_SERVER['SERVER_PORT'] + 1 ?>">phpMyAdmin</a> |
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

echo (nl2br(print_r(get_loaded_extensions(), true)));

echo ("</code><hr>");

if (isset($_GET['info'])) {
  phpinfo();
}
