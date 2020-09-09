<?php
include_once ('./utilities/config.php');
include_once ('./utilities/queries.php');
include_once ('./models/DB.php');
include_once ('./models/Advertisement.php');

class AdvertisementController
{
    private $model;
    private $DB = null;
    

    public function __construct($DB, $model = null) {
        $this->model = $model;
        $this->DB = $DB;
    }
    
    public function getAdvertisements() { 
        if($this->DB == null){
            return [];
        }
        $sql = getAdvertisementsQuery;
        $advertisements = [];
        $results = $this->DB->select($sql);
        foreach ($results as $advertisement){
            $advertisements[] = new Advertisement($advertisement["id"],$advertisement["userid"],$advertisement["username"],$advertisement["title"]);
        }
        return $advertisements;
    } 
}