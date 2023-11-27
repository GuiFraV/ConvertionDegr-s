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

        function celsiusToFahrenheit($celsius){
            return ($celsius * 9/5) + 32;
        }

        function celsiusToKelvin($celsius){
            return $celsius + 273.15;
        }

        function fahrenheitToCelsius($fahrenheit){
            return ($fahrenheit - 32) / 1.8;
        }

        function fahrenheitToKelvin($fahrenheit){
            return ($fahrenheit + 459.67) * 5/9;
        }

        function kelvinToCelsius($kelvin) {
            return $kelvin - 273.15;
        }

        function kelvinToFahrenheit($kelvin){
            return (9/5) * ($kelvin - 273.15) + 32;
        }


        if($_SERVER["REQUEST_METHOD"] == "POST"){

            $temperature = filter_input(INPUT_POST, "temp", FILTER_SANITIZE_NUMBER_FLOAT);
            $operator1 = htmlspecialchars($_POST["operator1"]);
            $operator2 = htmlspecialchars($_POST["operator2"]);
            $error = false;


            if(!is_numeric($temperature)){
                echo "<p>Vous n'avez pas rentré un nombre ou un chiffre ! </p>";
                $error = true;
            }

            if(!$error){
                
                $result = 0;

                switch ($operator1) {
                    case "celsius_temp1":
                        switch($operator2){
                            case "celsius":
                                $result = $temperature;
                                break;
                            case "fahrenheit":
                                $result = celsiusToFahrenheit($temperature);
                                break;
                            case "kelvin":
                                $result = celsiusToKelvin($temperature);
                                break;
                        }
                    break;
                    case "fahrenheit_temp1":
                        switch($operator2){
                            case "celsius":
                                $result = fahrenheitToCelsius($temperature);
                                break;
                            case "fahrenheit":
                                $result = $temperature;
                                break;
                            case "kelvin":
                                $result = fahrenheitToKelvin($temperature);
                                break;
                        }
                    break;
                    case "kelvin_temp1":
                        switch($operator2){
                            case "celsius":
                                $result = kelvinToCelsius($temperature);
                                break;
                            case "fahrenheit":
                                $result = kelvinToFahrenheit($temperature);
                                break;
                            case "kelvin":
                                $result =  $temperature;
                                break;
                        }
                    break;
                }

                echo "<p> La température est de " . $result . " ". $operator2 . "</p>";

            }
        }
    ?>

    
</body>
</html>