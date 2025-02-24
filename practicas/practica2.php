<?php 
    function saludar ($nombre) {
        echo "<p>Hola $nombre</p>";
    }
    saludar("Juan ");
    saludar("Ana ");
    saludar("Pedro ");

    function sumar ($a, $b) {
        return $a + $b;
    }


    echo "<p>La suma de 2 + 3 es: " . sumar(2, 3) . "</p>";
    $multiplicar = fn($a, $b) => $a * $b;

    $variable_global = 10;
    function miFuncion(){
        global $variable_global;
        echo "<p>" . $variable_global . "</p>";
        $variable_global++;
    }
    mifuncion();
    echo "<p>" . $variable_global . "</p>";

    function sumaContador(){
        static $contador = 0;
        $contador++;
        return $contador;
        echo "<p>" . $contador . "</p>";
    }
    echo "<p>" . sumaContador() . "</p>";
    echo "<p>" . sumaContador() . "</p>";
    echo "<p>" . sumaContador() . "</p>";
?>