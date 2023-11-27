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
        }
    }