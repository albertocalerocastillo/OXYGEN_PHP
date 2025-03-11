<?php
$json = file_get_contents('roomsData.json');
$habitaciones = json_decode($json, true);
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