<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $habitacion = [
        'name' => $_POST['name'],
        'number' => $_POST['number'],
        'price' => $_POST['price'],
        'offerPrice' => $_POST['offerPrice']
    ];

    ?>
    <h2>Habitación Creada</h2>
    <p><strong>Name:</strong> <?php echo $habitacion['name']; ?></p>
    <p><strong>Number:</strong> <?php echo $habitacion['number']; ?></p>
    <p><strong>Price:</strong> <?php echo $habitacion['price']; ?></p>
    <p><strong>Discount:</strong> <?php echo $habitacion['offerPrice']; ?></p>
    <?php
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
?>