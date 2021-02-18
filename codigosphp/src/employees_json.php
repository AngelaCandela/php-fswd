<?php
    header('Content-type: application/json');

    $server = 'localhost';
    $user = 'root';
    $password = 'example';
    $database = 'bootcamp';

    try {
        $conn = new PDO("mysql:host=$server; dbname=$database", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    } catch(PDOException $e) {
        echo "Error: " . $query . "<br>" . $e->getMessage();
    }

    try {             
        $stmt = $conn->prepare("SELECT * FROM employees");
        $stmt->execute();
        
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $results = $stmt->fetchAll();

        echo json_encode($results);
    } catch(PDOException $e) {
        echo "Error: " . $sql . "<br>" . $e->getMessage();
    }

    // Una vez terminado, cerramos la conexión
    $conn = null;
            
?>