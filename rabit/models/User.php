<?php

class User{

    private $id;
    private $name;


    function __construct($id = null, $name = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    function getName(){
        return "RabIT ".$this->name;
    }

    function getId(){
        return sprintf("%08d", $this->id);
    }
}

?>