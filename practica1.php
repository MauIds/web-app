<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
            $variable = "Texto";
            $variable_int = 12;
            $variable_float = 12.5;
            $variable_bool = true;


            echo "<p> Hola $variable </p>";
            echo "<p> Hola $variable_int </p>";
            echo "<p> Hola $variable_float </p>";
            echo gettype($variable_bool); // Devuelve el tipo de dato de la variable

            echo "<p>".(3+4). "</p>";
            // Operadores lógicos
            // && and
            // || or
            // ! not
            // == igual
            if (3>4 || 4>5) {
                echo "Es mayor";
            } else if (3>4) {
                echo "Es menor";
            }

            $var = 0;
            while ($var < 10) {
                echo "<p> $var </p>";
                $var++;
            }

            do{
                echo "<p> $var </p>";
                $var++;
            } while ($var < 10);

            // ciclo for
            for ($i=0; $i < 10; $i++) { 
                echo "<p> $i </p>";
            }

            $frutas = ["manzana", "pera", "uva", "sandia"];
            foreach ($frutas as $index => $name) {
                echo "<p> $index <b>$name</b> </p>";
            }
            
            $oper =2;
            switch ($oper) {
                case 1:
                    echo "<p>Es 1</p>";
                    break;
                case 2:
                    echo "<p>Es 2 </p>";
                    break;
                default:
                    echo "<p>No es ninguno</p>";
                    break;
            }




        ?>
</body>
</html>