<?php 
    class Persona{
        public $nombre;
        public $edad;

        public function __construct($nombre, $edad){
            $this->nombre = $nombre;
            $this->edad = $edad;
        }
        private function definirNombre(){
            return $this->nombre;
        }
        public function saludar(){
            echo "<p>" .$this->definirNombre(). "</p>";
        }
    }
    $persona3 = new Persona("Juan", 30);
    $persona3->saludar();
    $persona4 = new Persona("Ana", 25);
    $persona4->saludar();

    class Animal{
       public function saludar(){
           echo "<p>Hola soy un animal</p>";
       }
    }
    class Perro extends Animal{
        public function hacersonido(){
           return "Guau guau";
        }
    }
    $perro = new Perro();
    echo "<p>".$perro->saludar()."</p>";
    echo "<p>".$perro->hacersonido()."</p>";

    //Metodos estaticos
    class Miclase{
        public static function MetodoEstatico(){
            return "Soy un metodo estatico";
        }
    }
    echo "<p>".Miclase::MetodoEstatico()."</p>";
    $miobjeto = new Miclase();
    echo "<p>".$miobjeto->MetodoEstatico()."</p>";

    //interfaces
    interface interfaceAnimal{
        public function Hablar(); //metodos
        public function Grittar(); //metodos

    }
    class Ganado implements interfaceAnimal{
        public function saludar(){
            echo "<p>Hola soy un animal</p>";
        }
        public function Hablar(){
            return "Guau guau";
        }
        public function Grittar(){ //SE PUEDE IGNORAR EL METODO DE LA INTERFACE SI NO SE LE PONE EL ECHO O UN RETUNR
            return "Grrrrrr";
        }
    }
    $lavaca = new Ganado();
    $lavaca->saludar();
    $lavaca->Hablar();
    $lavaca->Grittar();

    //clases abstractas
    abstract class abstractaAnimal {
        protected $nombre;
        abstract public function Hablar();
        public function __construct($nombre){
            $this->nombre = $nombre;
        }
    }
    class Gato extends abstractaAnimal{
        public function Hablar(){
            return "Miau";
        }
    }
    $gatillo = new Gato("Misi");
    $gatillo->Hablar();

?>