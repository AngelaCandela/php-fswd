<?php

if(isset($_POST)) {

    $server = 'localhost';
    $user = 'root';
    $pw = 'example';
    $database = 'bootcamp';

    try {
        $conn = new PDO("mysql:host=$server; dbname=$database", $user, $pw);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $email = isset($_POST['email'])? $_POST['email'] : false;
        $password = isset($_POST['password'])? $_POST['password'] : false;

        $encryptedPassword = md5($password);

        $stmt = $conn->prepare("SELECT * FROM users WHERE email = '$email' AND password = '$encryptedPassword'");
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $results = $stmt->fetchAll();

        if(count($results) === 1) {
            echo "<h2>You have logged in successfully!</h2>";
        } else{
            echo "<h2>Wrong email or password</h2>";
            echo "<a href='login.php'><button>Back to Login</button></a>";
        }
        
    } catch(PDOException $e) {
        echo "Error: " . $sql . "<br>" . $e->getMessage();
    }
      
    // Una vez terminado, cerramos la conexión
    $conn = null;
}