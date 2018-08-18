<?php

class rectangle extends shape
{
    public $width = 0;
    public $length = 0;

    function __construct ($l, $w) {
        $this->setName('Rectangle');
        $this->length = $l;
        $this->width = $w;
        echo "Rectangle is created <br>";
    }

    function calculateArea () {
        return $this->area = $this->length * $this->width;
    }
}

?>
