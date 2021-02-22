<?php

if(isset($_POST)) {

    $server = 'localhost';
    $user = 'root';
    $pw = 'example';
    $database = 'bootcamp';

    try {
        $name = isset($_POST['name'])? $_POST['name'] : false;
        $email = isset($_POST['email'])? $_POST['email'] : false;
        $password = isset($_POST['password'])? $_POST['password'] : false;
        $confirmPassword = isset($_POST['confirm_password'])? $_POST['confirm_password'] : false;

        if($password === $confirmPassword) {

            $conn = new PDO("mysql:host=$server; dbname=$database", $user, $pw);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT * FROM users WHERE email = '$email'");           
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $results = $stmt->fetchAll();

            if(count($results) === 0) {
                $encryptedPassword = md5($_POST['password']);
                $sql = "INSERT INTO users VALUES (null, '$name', '$email', '$encryptedPassword')";
                $conn->exec($sql);
                echo "<h2>You have signed up successfully!</h2>";
            } else{
                echo "<h2>This user already exists, please try with a different email address.</h2>";
                echo "<a href='signup.php'><button>Back to Sign up</button></a>";       
            }           
        } else{
            echo "<h2>The fields 'Password' and 'Confirm password' must be the same.</h2>";
        }
    } catch(PDOException $e) {
        echo "Error: " . $sql . "<br>" . $e->getMessage();
    }
      
    // Una vez terminado, cerramos la conexión
    $conn = null;
}