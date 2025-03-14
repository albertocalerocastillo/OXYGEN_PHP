<?php
class Room {
    public $name;
    public $number;
    public $price;
    public $offerPrice;

    public function __construct($name, $number, $price, $offerPrice) {
        $this->name = $name;
        $this->number = $number;
        $this->price = $price;
        $this->offerPrice = $offerPrice;
    }

    public static function getAllFromJSON() {
        $roomsData = file_get_contents('roomsData.json');
        $roomsArray = json_decode($roomsData, true);
        $rooms = [];
        foreach ($roomsArray as $roomData) {
            $rooms[] = new Room(
                $roomData['name'],
                $roomData['number'],
                $roomData['price'],
                $roomData['offerPrice']
            );
        }
        return $rooms;
    }

    public static function getAllFromDB() {
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

        $rooms = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $rooms[] = new Room(
                    $row['name'],
                    $row['number'],
                    $row['price'],
                    $row['offerPrice']
                );
            }
        }

        $conn->close();
        return $rooms;
    }
}
?>