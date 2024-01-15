

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "matkaja";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Yhdistaminen tietokantaan ei onnistunut: " . mysqli_connect_error());
}

echo "Yhdistaminen tietokantaan onnistui!";


?>
