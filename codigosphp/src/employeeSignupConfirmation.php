<?php

if(isset($_POST)) {

    $server = 'localhost';
    $user = 'root';
    $pw = 'example';
    $database = 'bootcamp';

    try {
        $name = isset($_POST['name'])? $_POST['name'] : false;
        $email = isset($_POST['email'])? $_POST['email'] : false;
        $age = isset($_POST['age'])? $_POST['age'] : false;
        $city = isset($_POST['city'])? $_POST['city'] : false;

        $conn = new PDO("mysql:host=$server; dbname=$database", $user, $pw);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM employees WHERE email = '$email'");           
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $results = $stmt->fetchAll();

        if(count($results) === 0) {
            
            $sql = "INSERT INTO employees VALUES (null, '$name', '$email', $age, '$city')";
            $conn->exec($sql);
            echo "<h2>Employee added successfully!</h2>";
            header('Location: employees.php');
        } else{
            echo "<h2>This employee already exists, please try with a different one.</h2>"; 
            echo "<a href='employees.php'><button>Back</button></a>";      
        }
    } catch(PDOException $e) {
        echo "Error: " . $sql . "<br>" . $e->getMessage();
    }
      
    // Una vez terminado, cerramos la conexión
    $conn = null;
}