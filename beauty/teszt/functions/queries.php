<?php

class Queries
{
    public static $login = "SELECT * from admin where username = ? and password = ?";
    public static $getCostumerAddresses = "SELECT address.id as id,costumeraddress.costumer,type.name as type,type.id as typeId,def,country,city,street,hnumber,postal
    FROM costumeraddress
    LEFT JOIN address
    ON costumeraddress.address = address.id
    LEFT JOIN type
    ON costumeraddress.type = type.id
    WHERE costumer = ?
    ";
    public static $getAddresses = "SELECT * from address";
    public static $getCostumers = "SELECT id,name,email,password,tax_number from costumer";
    public static $getTypes = "SELECT * from type";
    public static $addAddress = "INSERT into address(country,city,street,hnumber,postal) values(?,?,?,?,?)";
    public static $addCostumerAddress = "INSERT INTO costumeraddress(costumer,address,type,def) VALUES(?,?,?,?)";
    public static $deleteCostumerAddress = "DELETE from costumeraddress where address = ? and costumer = ? and type = ?";
    public static $setDefaultAddress = "UPDATE costumeraddress set def = 1 where costumer = ? and address = ? and type = ? ";
    public static $setNotDefaultAddress = "UPDATE costumeraddress set def = 0 where costumer = ? and type = ? ";
    public static $setCostumer = "UPDATE costumer set name = ?, email = ?, password = ?, tax_number = ? where id = ?";
    public static $deleteCostumer = "DELETE from costumer where id = ?";
    public static $deleteAddressByCostumer = "DELETE from costumeraddress where costumer = ?";
    public static $addCostumer = "INSERT INTO costumer(name,email,password,tax_number) VALUES(?,?,?,?)";
    public static $addLog = "INSERT INTO log(costumer,level,event,comment) values(?,?,?,?)";
    public static $getLog = "SELECT costumer, level, event, comment, dt FROM log";
}