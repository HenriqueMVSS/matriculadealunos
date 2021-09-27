<?php

try {
  $serverName = "localhost";
  $database = "cadAlunos";
  $user = "henrique";
  $password = "12345";

  $conn = new PDO("pgsql:host=$serverName;port=5432;dbname=$database", $user, $password);

  // echo "Conectado no banco de dados!!";
} catch (PDOException $exception1) {
  echo "<h1>Caught PDO exception:</h1>";
  echo $exception1->getMessage() . PHP_EOL;
  echo "<h1>PHP Info for troubleshooting</h1>";
  phpinfo();
}

