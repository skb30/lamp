<?php

class circle extends shape
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
