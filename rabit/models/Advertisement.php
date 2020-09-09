<?php

class Advertisement{

    private $id;
    private $userid;
    private $username;
    private $title;


    function __construct($id = null, $userid = null, $userName = null, $title = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->userid = $userid;
        $this->userName = $userName;

    }

    function getTitle(){
        return "RabIT ads".$this->title;
    }

    function getUserName(){
        return "RabIT ".$this->userName;
    }

    function getId(){
        return sprintf("%08d", $this->id);
    }

}

?>