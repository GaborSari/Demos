<?php
include_once ('./utilities/config.php');
include_once ('./utilities/queries.php');
include_once ('./models/DB.php');
include_once ('./models/User.php');

class UserController
{
    private $model;
    private $DB = null;
    

    public function __construct($DB, $model = null) {
        $this->model = $model;
        $this->DB = $DB;
    }
    
    public function getUsers() { 
        if($this->DB == null){
            return [];
        }
        $sql = getUsersQuery;
        $users = [];
        $results = $this->DB->select($sql);
        foreach ($results as $user){
            $users[] = new User($user["id"],$user["name"]);
        }
        return $users;
    } 
}