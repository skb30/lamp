<?php

require_once('interface_shape.php');

class circle extends shape implements iCalculateArea
{
    public $radius = 0;

    function __construct ($r) {
        $this->name = 'Circle';
        $this->radius = $r;
        echo "Circle is created <br>";
    }

    function calculateArea () {
        return $this->area = pi()*pow($this->radius,2);
    }

}

?>
