<?php
require_once 'BladeOne.php';

use eftec\bladeone\BladeOne;

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "habitaciones";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT name, number, price, offerPrice FROM habitaciones";
$result = $conn->query($sql);

$habitaciones = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $habitaciones[] = $row;
    }
} else {
    echo "0 resultados";
}

$conn->close();

$views = __DIR__ . '/views';
$cache = __DIR__ . '/cache';

$blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);

echo $blade->run("rooms", ["habitaciones" => $habitaciones]);
?>