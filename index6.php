<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "habitaciones";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT name, number, price, offerPrice FROM habitaciones WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $habitacion = $result->fetch_assoc();
        ?>
        <h2>Habitación Encontrada</h2>
        <p><strong>Name:</strong> <?php echo $habitacion['name']; ?></p>
        <p><strong>Number:</strong> <?php echo $habitacion['number']; ?></p>
        <p><strong>Price:</strong> <?php echo $habitacion['price']; ?></p>
        <p><strong>Discount:</strong> <?php echo $habitacion['offerPrice']; ?></p>
        <?php
    } else {
        echo '<p>Habitación no encontrada.</p>';
    }

    $stmt->close();
} else {
    echo '<p>Por favor, proporciona un ID en la URL.</p>';
}

$conn->close();
?>