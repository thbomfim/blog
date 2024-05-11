<?php

$user = "root";
$password = ""; 

try {
    $conn = new PDO('mysql:host=localhost;dbname=meuBancoDeDados', $root, $password


























);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch(PDOException $e) {
      echo 'ERROR: ' . $e->getMessage();
  }
  ?>