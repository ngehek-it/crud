<?php 

try {
  $host = "localhost";
  $dbname = "crud";
  $dbUsername = "root";
  $dbPassword = "";
  $conn = new PDO("mysql:host=$host;dbname=$dbname", $dbUsername, $dbPassword);
} catch (PDOException $e) {
  echo $e->getMessage();
}

?>