<?php
$json = file_get_contents('roomsData.json');
$habitaciones = json_decode($json, true);

echo '<pre>';
print_r($habitaciones);
echo '</pre>';
?>