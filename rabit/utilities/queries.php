<?php
define("getUsersQuery", "SELECT id, name FROM Users");

define("getAdvertisementsQuery", "SELECT Advertisements.id, title, name as username,userid FROM Advertisements 
INNER JOIN Users ON Advertisements.userid=Users.id ORDER BY username ASC");

?>