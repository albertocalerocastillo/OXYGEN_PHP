<?php
require_once 'setup.php';
require_once 'Room.php';

$habitacionesDB = Room::getAllFromDB();
$habitacionesJSON = Room::getAllFromJSON();

echo $blade->run("rooms", ['habitaciones' => $habitacionesDB]);
echo $blade->run("rooms", ['habitaciones' => $habitacionesJSON]);
?>