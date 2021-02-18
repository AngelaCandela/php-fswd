<?php    

    function spanishDaysOfTheWeek($dayOfTheWeek) {

        switch($dayOfTheWeek){
            case ("Monday"):
                $dayOfTheWeekES = "Lunes";
                break;
            case ("Tuesday"):            
                $dayOfTheWeekES = "Martes";
                break;
            case ("Wednesday"):
                $dayOfTheWeekES = "Miércoles";
                break;
            case ("Thursday"):            
                $dayOfTheWeekES = "Jueves";
                break;
            case ("Friday"):
                $dayOfTheWeekES = "Viernes";
                break;
            case ("Saturday"):
                $dayOfTheWeekES = "Sábado";
                break;
            case ("Sunday"):
                $dayOfTheWeekES = "Domingo";
                break;
        }

        return $dayOfTheWeekES;
    }

    $today = date("l");
    $todayinSpanish = spanishDaysOfTheWeek($today);

    print_r($_GET);
    $person = $_GET['name'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title>Calendar</title>
</head>
<body>
    <?php require_once "menu.php"; ?>    

    <h1>Hola, <?php echo $person ?>!</h1>
    <p>Hoy es <strong><?php echo $todayinSpanish ?></strong>. ¿Qué tal estás?</p>
    
</body>
</html>
