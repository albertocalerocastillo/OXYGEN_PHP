<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "habitaciones";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $number = $_POST['number'];
    $price = $_POST['price'];
    $offerPrice = $_POST['offerPrice'];

    $sql = "INSERT INTO habitaciones (name, number, price, offerPrice) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $number, $price, $offerPrice);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        $habitacion = [
            'name' => $name,
            'number' => $number,
            'price' => $price,
            'offerPrice' => $offerPrice
        ];

        ?>
        <h2>Habitación Creada y Guardada</h2>
        <p><strong>Name:</strong> <?php echo $habitacion['name']; ?></p>
        <p><strong>Number:</strong> <?php echo $habitacion['number']; ?></p>
        <p><strong>Price:</strong> <?php echo $habitacion['price']; ?></p>
        <p><strong>Discount:</strong> <?php echo $habitacion['offerPrice']; ?></p>
        <?php
    } else {
        echo '<p>Error al guardar la habitación.</p>';
    }

    $stmt->close();
} else {
    ?>
    <form method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br><br>

        <label for="number">Number:</label><br>
        <input type="text" id="number" name="number"><br><br>

        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price"><br><br>

        <label for="offerPrice">Discount:</label><br>
        <input type="text" id="offerPrice" name="offerPrice"><br><br>

        <input type="submit" value="Crear Habitación">
    </form>
    <?php
}

$conn->close();
?>