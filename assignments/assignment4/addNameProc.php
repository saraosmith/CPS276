<?php

    class AddNameProc {
        public $name;
    function set_name($name) {
        $this->name = $name;
        $x=explode(" ",$name);


    $y=array("lname"=>$x[1],"fname"=>$x[0]);
    $z = implode(" ,",$y);

    return $z;

    }

}

?>