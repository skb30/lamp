<?php

class shape
{
    public $name;
    public $area = 0;

    function __construct ($n) {
        $this->name = $n;
        echo "Shape created: $this->name <br>";
    }

    function __destruct () {
        echo "Shape DESTROYED: $this->name <p></p>";
    }

    function __toString () {
        return "Shape named $this->name has an area of $this->area";
    }

}

?>
