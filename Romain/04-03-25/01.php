<?php

//This is a comment in one line

/*This is a

multi line

comment*/

$var;

$var = "My variable";

$foo = "Hello";

$bar = 12;

//CONST Your = "variable constante";

define("MyConst", "variable constante");

//echo $bar + $foo;

$longage = "PHP";

const NOM = "Eduardo";

$var and $longage; //et

$var && $longage; // sont la meme chose

function Salutation($Name)
{

    echo __FUNCTION__;

    echo "Hola $Name";
}


?>



<html>



<head>

    <title>My page</title>

</head>



<body>

    <!-- This is HTML comment -->

    <p><?php echo $var ?></p>

    <p><?php echo $foo . $var; ?></p>



    <?php unset($foo); ?>

    <p><?php echo $var ?></p>

    <p><?php echo "variable\' $longage"; ?></p>

    <p><?php echo gettype($longage)  ?></p>

    <p><?php echo gettype($bar)  ?></p>

    <p><?php echo intval(32)  ?></p>

    <p><?php echo intval(3.2); ?></p>

    <p><?php echo intval(0x1A);  ?></p>

    <p><?php echo floatval("122.64BLABLABLA"); ?></p>

    <p><?php echo floatval("BLABLABLA122.64"); ?></p>

    <p><?php echo strval(32);  ?></p>

    <p><?php echo MyConst  ?></p>

    <?php //Myconst = clarisse;

    ?>

    <p><?php echo NOM  ?></p>

    <?php $var = 3; ?>

    <p>$var = 3</p>

    <p><?php echo is_int($var) . "<br>"; ?></p>

    <p><?php echo gettype($var) . "<br>"; ?></p>

    <?php $var = "Hello World"; ?>

    <p>$var =Hello World<?php echo "'" . is_int($var) . "'<br>"; ?></p>

    <p><?php echo (is_int($var) ? "True" : "False") . "<br>"; ?></p>

    <p><?php echo is_string($var) . "<br>"; ?></p>

    <p><?php echo gettype($var) . "<br>"; ?></p>

    <p><?php echo __LINE__; ?></p>

    <p><?php echo __FILE__;  ?></p>

    <p><?php echo __DIR__  ?></p>

    <p><?php salutation("Eduardo"); ?></p>

    <p><?php   ?></p>

    <p><?php   ?></p>

    <?php $age = 0; ?>

    <p><?php echo $age++;  ?></p>

    <p><?php echo $age;  ?></p>

    <p><?php echo ++$age; ?></p>

    <?php

    $saludo = "Chao";

    if ($saludo == "Hello") {

        echo "Hola qué tal?\n";
    } else echo "Adios\n";



    echo ($saludo == "Chao" ? "Nos vemos\n" : "Qué tal?");



    $str = "Hello";

    switch ($str) {

        case "Hello":

            echo "Salut"; // Code

            break;

        case "Bye":

            echo "Au revoir"; // Code

            break;

        default:

            echo   "!"; // Code

            break;
    }



    $array = ['peach', 'banana', 'apple'];

    foreach ($array as $key => $value) {

        echo $key . " : " . $value;
    }

    ?>

    <p><?php   ?></p>

    <p><?php   ?></p>

    <p><?php   ?></p>







    <?php

    // This is a PHP comment

    /* This one too! */

    ?>

</body>



</html>