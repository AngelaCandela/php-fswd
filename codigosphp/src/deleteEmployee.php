<?php

$server = 'localhost';
$user = 'root';
$password = 'example';
$database = 'bootcamp';

try {
    $conn = new PDO("mysql:host=$server; dbname=$database", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DELETE FROM employees WHERE id=$_GET[id]";    
    $conn->exec($sql);

    header('Location: employees.php');
} catch(PDOException $e) {
  echo "Error: " . $sql . "<br>" . $e->getMessage();
}

// Una vez terminado, cerramos la conexión
$conn = null;