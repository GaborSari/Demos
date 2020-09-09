<?php

session_start();
include('./header.php');
include('./models/costumer.php');
checkSession();


if (isset($_POST['add'])) {
  checkLevel(addLevel);
  $jsonUser = json_decode($_POST['costumer']);
  $costumer = new Costumer($DB, $jsonUser->id, $jsonUser->name, $jsonUser->email, $jsonUser->password, $jsonUser->tax_number);
  $costumer->addAddress(
    $_POST['type'],
    $_POST['country'],
    $_POST['city'],
    $_POST['street'],
    $_POST['hnumber'],
    $_POST['postal']
  );
  echo '<div class="ui floating message mcenter">
            <p>Done!</p>
          </div>';
}

if (isset($_POST['delete'])) {
  checkLevel(deleteLevel);
  $jsonUser = json_decode($_POST['costumer']);
  $costumer = new Costumer($DB, $jsonUser->id, $jsonUser->name, $jsonUser->email, $jsonUser->password, $jsonUser->tax_number);
  ($costumer->deleteAddress($_POST["addressId"], $_POST["addressType"]));
  echo '<div class="ui floating message mcenter">
            <p>Done!</p>
          </div>';
}

if (isset($_POST['default'])) {
  checkLevel(editLevel);
  $jsonUser = json_decode($_POST['costumer']);
  $costumer = new Costumer($DB, $jsonUser->id, $jsonUser->name, $jsonUser->email, $jsonUser->password, $jsonUser->tax_number);
  $costumer->setDefaultAddress($_POST["addressId"], $_POST["addressType"]);
  echo '<div class="ui floating message mcenter">
            <p>Done!</p>
          </div>';
}