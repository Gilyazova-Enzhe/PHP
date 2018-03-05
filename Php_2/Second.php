<?php
/**
 * Created by PhpStorm.
 * User: hp
 * Date: 26.02.2018
 * Time: 16:39
 */
require 'Second.html';

function changeString($string) {
    $change_str = "";
    function generatorString($string)
    {
        static $count = 0;
        for ($i = 0; $i < strlen($string); $i++) {
            switch ($string[$i]) {
                case "h":
                    $count++;
                    yield "4";
                    break;
                case "l":
                    $count++;
                    yield "1";
                    break;
                case "e":
                    $count++;
                    yield "3";
                    break;
                case "o":
                    $count++;
                    yield "0";
                    break;
                default:
                    yield $string[$i];
                    break;
            }
        }

        return $count;
    }

    $generator = generatorString($string);
    foreach ($generator as $value) {
        $change_str .= $value;
    }

    echo "Number of characters: " . $generator->getReturn() . "<br>";
    return $change_str;
}

$message = "";
if (isset($_POST['message'])) {
    $message = $_POST['message'];
}
echo "Result: ". changeString($message);
