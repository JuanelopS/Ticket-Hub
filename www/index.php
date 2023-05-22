<?php

class Producto
{
    #defino algunas propiedades
    public $nombre;
    public $precio;
    protected $estado;
    #defino el método set_estado_producto()
    protected function set_estado_producto($estado)
    {
        $this->estado = $estado;
    }
    # constructor de la clase
    function __construct($nombre, $precio)
    {
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->set_estado_producto('en uso');
    }
}

$fanta = new Producto('fanta',3);

var_dump($fanta);

class MyDestructableClass
{
    function __construct()
    {
        print "<br>En el constructor<br>";
    }

    function __destruct()
    {
        print "Destruyendo " . __CLASS__ . "\n";
    }
}

$obj = new MyDestructableClass();