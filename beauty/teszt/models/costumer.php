<?php

include_once('./functions/db.php');
include_once('./functions/queries.php');
class Costumer
{
    public $id;
    public $name;
    public $email;
    public $tax_number;
    public $addresses;
    public $defaultAddressesSet = false;

    public $password;

    private $db_instance = null;
    public $types;


    public function __construct($db_instance, $id, $name, $email, $password, $tax_number)
    {
        if (!isset($this->email)) {
            $this->db_instance = $db_instance;
            $this->email = $email;
            $this->password = $password;
            $this->tax_number = $tax_number;
            $this->name = $name;
            $this->id = $id;
            $this->getAddresses();
        }
    }


    public function getAddresses()
    {
        $result = $this->db_instance->runPreparedQuery(Queries::$getCostumerAddresses, [$this->id]);
        $this->addresses = $result;
        $insertedtypes = [];
        foreach ($result as $address) {
            if ((int) $address["def"] == 1)
                $insertedtypes[] = $address["type"];
        }
        if (count(array_unique($insertedtypes)) >= count($this->db_instance->getTypes())) {
            $this->defaultAddressesSet = true;
        }
        return  $this->addresses;
    }

    public function addAddress($type, $country, $city, $street, $hnumber, $postal)
    {
        $same = false;
        foreach ($this->db_instance->getAddresses() as $address) {
            if (
                $address["country"] == $country
                && $address["city"] == $city
                && $address["street"] == $street
                && (int) $address["hnumber"] == (int) $hnumber
                && (int) $address["postal"] == (int) $postal
            ) {
                $same = $address["id"];
            }
        }
        if ($same == false) {
            $this->db_instance->runPreparedQuery(Queries::$addAddress, [$country, $city, $street, (int) $hnumber, (int) $postal], false);
            $id = ($this->db_instance->getLastInsertId());
        } else {
            $id = $same;
        }
        $result = $this->db_instance->runPreparedQuery(Queries::$addCostumerAddress, [(int) $this->id, (int) $id, (int) $type, 0], false);
        $admin = unserialize($_SESSION['admin']);
        $admin->addLog($this->name, 1, "Add Address");
        return $result;
    }

    public function deleteAddress($addressId, $addressType)
    {
        $result = $this->db_instance->runPreparedQuery(Queries::$deleteCostumerAddress, [(int) $addressId, (int) $this->id, (int) $addressType], false);
        $admin = unserialize($_SESSION['admin']);
        $admin->addLog($this->name, 1, "Delete Address");
        return $result;
    }
    public function setDefaultAddress($addressId, $addressType, $def = 1)
    {
        $result = $this->db_instance->runPreparedQuery(Queries::$setNotDefaultAddress, [(int) $this->id, (int) $addressType], false);
        $result = $this->db_instance->runPreparedQuery(Queries::$setDefaultAddress, [(int) $this->id, (int) $addressId, (int) $addressType], false);
        return $result;
    }
    public function update($name, $email, $password, $tax_number)
    {
        if (empty($password)) {
            $password = $this->password;
        }

        $result = $this->db_instance->runPreparedQuery(Queries::$setCostumer, [$name, $email, md5($password), (int) $tax_number, (int) $this->id], false);
        $admin = unserialize($_SESSION['admin']);
        $admin->addLog($this->name, 1, "Update User");
        return $result;
    }
    public function delete()
    {
        $this->db_instance->runPreparedQuery(Queries::$deleteAddressByCostumer, [(int) $this->id], false);
        $admin = unserialize($_SESSION['admin']);
        $admin->addLog($this->name, 2, "Delete User");
        return $this->db_instance->runPreparedQuery(Queries::$deleteCostumer, [(int) $this->id], false);
    }
}