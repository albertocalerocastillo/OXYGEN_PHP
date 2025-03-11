<?php
if (isset($_GET['id'])) {
    $id = trim($_GET['id']);

    echo "ID recibido: " . $id . "<br>";

    $json = file_get_contents('roomsData.json');
    $habitaciones = json_decode($json, true);

    if ($habitaciones === null && json_last_error() !== JSON_ERROR_NONE) {
        echo "Error al decodificar JSON: " . json_last_error_msg() . "<br>";
        return;
    }

    foreach ($habitaciones as $habitacion) {
        echo "ID de habitación: " . $habitacion['id'] . "<br>";

        if (trim($habitacion['id']) === $id) {
            $habitacionEncontrada = $habitacion;
            break;
        }
    }

    if (isset($habitacionEncontrada)) {
        ?>
        <h2>Habitación Encontrada</h2>
        <p><strong>Name:</strong> <?php echo $habitacionEncontrada['name']; ?></p>
        <p><strong>Number:</strong> <?php echo $habitacionEncontrada['number']; ?></p>
        <p><strong>Price:</strong> <?php echo $habitacionEncontrada['price']; ?></p>
        <p><strong>Discount:</strong> <?php echo $habitacionEncontrada['offerPrice']; ?></p>
        <?php
    } else {
        echo '<p>Habitación no encontrada.</p>';
    }
} else {
    echo '<p>Por favor, proporciona un ID en la URL.</p>';
}
?>