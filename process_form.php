<?php
include('cfg.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $destination = $_POST["destination"];
    $passengers = $_POST["passengers"];
    $arrival_date = $_POST["arrival_date"];
    $departure_date = $_POST["departure_date"];

    // 插入数据到数据库
    $sql = "INSERT INTO customers (name, email, phone, address, destination, passengers, arrival_date, departure_date)
            VALUES ('$name', '$email', '$phone', '$address', '$destination', $passengers, '$arrival_date', '$departure_date')";

    if ($conn->query($sql) === TRUE) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
