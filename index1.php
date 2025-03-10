<?php
$habitaciones = [
    [
        'ID' => 1,
        'Name' => 'Habitación Estándar',
        'Number' => 101,
        'Price' => 100,
        'Discount' => 10
    ],
    [
        'ID' => 2,
        'Name' => 'Habitación Deluxe',
        'Number' => 201,
        'Price' => 200,
        'Discount' => 15
    ],
    [
        'ID' => 3,
        'Name' => 'Suite Presidencial',
        'Number' => 301,
        'Price' => 300,
        'Discount' => 20
    ]
];

echo '<pre>';
print_r($habitaciones);
echo '</pre>';
?>