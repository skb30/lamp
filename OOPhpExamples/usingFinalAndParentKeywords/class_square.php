<?php

class square extends rectangle
{
    function __construct ($side) {
        $this->name = 'Square';
        $this->length = $side;
        $this->width = $side;
        echo parent::borderStatus();
        echo "Square is created <br>";
    }

}

?>
