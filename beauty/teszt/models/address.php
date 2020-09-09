<?php

class Address
{
    public $country, $city, $street, $hnumber, $postal;

    public function __construct($country, $city, $street, $hnumber, $postal)
    {
        $this->country = $country;
        $this->city = $city;
        $this->street = $street;
        $this->hnumber = $hnumber;
        $this->postal = $postal;
    }
}