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

        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $temp = filter_input(INPUT_POST, "temp", FILTER_SANITIZE_NUMBER_FLOAT);
            $operator1 = htmlspecialchars($_POST["operator1"]);
            $operator2 = htmlspecialchars($_POST["operator2"]);

            $error = false;

            if(!$temp){
                echo "<p>Vous n'avez pas rentré de nombre !</p>";
                $error = true;
            }

            if(!is_numeric($temp)){
                echo "<p>Vous n'avez pas rentré un nombre ou un chiffre</p>";
                $error = true;
            }

            if(!$error){

                $result = 0;

                if($operator1 === "celsius_temp1" && $operator2 === "celsius"){
    
                    echo "<p>La température en Celsius est de ". $temp . "</p>";
    
                }
    
                if($operator1 === "celsius_temp1" && $operator2 === "fahrenheit"){
    
                    $result = ($temp * 9/5) + 32;
    
                    echo "<p>La température en Fahrenheit est de ". $result . "</p>";
    
                }
    
                if($operator1 === "celsius_temp1" && $operator2 === "kelvin"){
    
                    $result = $temp + 273.15 ;
    
                    echo "<p>La température en Kelvin est de ". $result . "</p>";
    
                }
    
                if($operator1 === "fahrenheit_temp1" && $operator2 === "celsius"){
    
                    $result = ($temp - 32)/1.8;
    
                    echo "<p>La température en Celsius est de ". $result . "</p>";
    
                }
    
                if($operator1 === "fahrenheit_temp1" && $operator2 === "fahrenheit"){
    
    
                    echo "<p>La température en Fahrenheit est de ". $temp . "</p>";
    
                }
    
                if($operator1 === "fahrenheit_temp1" && $operator2 === "kelvin"){
    
                    $result = ($temp + 459.67) * 5/9;
    
                    echo "<p>La température en Kelvin est de ". $result . "</p>";
    
                }
    
                 if($operator1 === "kelvin_temp1" && $operator2 === "celsius"){
    
                    $result = $temp - 273.15;
    
                    echo "<p>La température en Kelvin est de ". $result . "</p>";
    
                }
    
                 if($operator1 === "kelvin_temp1" && $operator2 === "fahrenheit"){
    
                    $result = (9/5) * ($temp - 273.15) + 32;
    
                    echo "<p>La température en Fahrenheit est de ". $result . "</p>";
    
                }
    
                 if($operator1 === "kelvin_temp1" && $operator2 === "kelvin"){
    
                
                    echo "<p>La température en Kelvin est de ". $temp . "</p>";
    
                }



            }





        }
    
    ?>

    
</body>
</html>