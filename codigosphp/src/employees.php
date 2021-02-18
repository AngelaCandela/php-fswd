<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <?php require_once "menu.php"; ?>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Age</th>
            <th>City</th>
        </tr>

        <?php

            /* $people = [
                ['name' => 'Carlos', 'email' => 'carlos@correo.com', 'age' => 20, 'city' => 'Benalmádena'],
                ['name' => 'Carmen', 'email' => 'carmen@correo.com', 'age' => 15, 'city' => 'Fuengirola'],
                ['name' => 'Carmelo', 'email' => 'carmelo@correo.com', 'age' => 17, 'city' => 'Torremolinos'],
                ['name' => 'Carolina', 'email' => 'carolina@correo.com', 'age' => 18, 'city' => 'Málaga'],
            ]; */

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

                foreach($results as $result) {
                    echo"<tr>
                            <td>".$result['name']."</td>
                            <td>".$result['email']."</td>
                            <td>".$result['age']."</td>
                            <td>".$result['city']."</td>
                        </tr>";
                }
            } catch(PDOException $e) {
                echo "Error: " . $sql . "<br>" . $e->getMessage();
            }

            // Una vez terminado, cerramos la conexión
            $conn = null;           
        ?>
        
    </table>
    <script src="main.js">
</body>
</html>