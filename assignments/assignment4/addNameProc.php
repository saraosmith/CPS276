<?php

    class AddNameProc {
        public $name;
    function set_name($name) {
        $this->name = $name;
        $x = implode(", ", array_reverse(explode(" ", $name)));

    return $x . "\n";

    }

}

?>