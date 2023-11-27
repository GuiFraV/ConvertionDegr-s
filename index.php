<?php include 'temperature_logic.php'; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertion de température</title>
</head>
<body>
    
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        <input type="number" name="temp">
        <select name="operator1" >
            <option value="celsius_temp1">Celsius</option>
            <option value="fahrenheit_temp1">Fahrenheit</option>
            <option value="kelvin_temp1">Kelvin</option>
        </select>
        <select name="operator2" >
            <option value="celsius">Celsius</option>
            <option value="fahrenheit">Fahrenheit</option>
            <option value="kelvin">Kelvin</option>
        </select>
        <button>Convert</button>
    </form>

    <?php 
        if($result !== ""){
            echo "<p> La température est de " . $result . " ". $operator2 . "</p>";
        }
    ?>

    
</body>
</html>