<?php
    //Arrays
    $frutas = ["manzana", "pera", "uva"];
    echo "<p>" .count ($frutas). "</p>";
    //Arreglos asociativos
    $edades = ["Ana" => 26, "Mau" => 21, "Jaz"=> 23];
    echo "<p>" .$edades["Ana"]. "</p>";
    //Estructuras mas complejas
    $cantidades = ["Ana" => [12,24,56], "Mau" => [34,56,78], "Jaz" => [1]];
    echo "<p>" .$cantidades["Mau"][0]. "</p>";
    $materias = ["Ana"=>["edad"=>26,"materia"=>"POO"], "Mau"=>["edad"=>21,"materia"=>" WEB"]];
    echo "<p>" .$materias["Mau"]["edad"].$materias ["Mau"]["materia"]. "</p>";

    //Pilas LIFO (Last In First Out)
    $pila = [];
    array_push($pila, "A");
    array_push($pila, "B");
    array_push($pila, "C");
    array_push($pila, "D");

    while (!empty($pila)){
        echo "<p>".array_pop($pila)."</p>"; //funcion de pop para sacar el ultimo elemento
    }
    //Colas FIFO (First In First Out)
    $cola = [];
    array_push($cola, "A");
    array_push($cola, "B");
    array_push($cola, "C");
    array_push($cola, "D");
    while (!empty($cola)){
        echo "<p>".array_shift($cola)."</p>"; //funcion de shift para sacar el primer elemento
    }
?>