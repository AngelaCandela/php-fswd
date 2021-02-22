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
            <th>Actions</th>
        </tr>

        <?php
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

            $sortByColumn = id;

            try {             
                $stmt = $conn->prepare("SELECT * FROM employees ORDER BY $sortByColumn");
                $stmt->execute();
              
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $results = $stmt->fetchAll();

                foreach($results as $result) {
                    echo"<tr>
                            <td>".$result['name']."</td>
                            <td>".$result['email']."</td>
                            <td>".$result['age']."</td>
                            <td>".$result['city']."</td>
                            <td>
                            <a href='deleteEmployee.php?id=$result[id]'><button onClick= 'return confirm(`Are you sure?`)'>DELETE</button></a>
                            </td>
                        </tr>";
                }
            } catch(PDOException $e) {
                echo "Error: " . $sql . "<br>" . $e->getMessage();
            }

            // Una vez terminado, cerramos la conexión
            $conn = null;           
        ?>
        
    </table>

    <div>

    <h3>Add an employee to the list</h3>
        <form action="employeeSignupConfirmation.php" method="post">

            <label for="name">Name</label>
            <input type="text" id="name" name="name" />

            <label for="email">Email</label>
            <input type="email" id="email" name="email" />
        
            <label for="age">Age</label>
            <input type="number" id="age" name="age" />

            <label for="city">City</label>
            <input type="text" id="city" name="city" />
        
            <input type="submit" value="Add employee">
        </form>
    </div>
    <script src="main.js">
</body>
</html>