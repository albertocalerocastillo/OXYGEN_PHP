<?php
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
?>

<ol>
    <?php foreach ($habitaciones as $habitacion): ?>
        <li>
            <strong>Name:</strong> <?php echo $habitacion['name']; ?><br>
            <strong>Number:</strong> <?php echo $habitacion['number']; ?><br>
            <strong>Price:</strong> <?php echo $habitacion['price']; ?><br>
            <strong>Discount:</strong> <?php echo $habitacion['offerPrice']; ?>
        </li>
    <?php endforeach; ?>
</ol>