<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tervetuloa</title>
</head>
<body>
<?php
include 'cfg.php';



// Suorita kysely

$sql = "SELECT id, name, email, phone, address, destination, passengers, arrival_date, departure_date FROM customers ORDER BY id";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Whereto</th>
                <th>Howmany</th>
                <th>Arrivals</th>
                <th>Leaving</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["phone"] . "</td>
                <td>" . $row["address"] . "</td>
                <td>" . $row["destination"] . "</td>
                <td>" . $row["passengers"] . "</td>
                <td>" . $row["arrival_date"] . "</td>
                <td>" . $row["departure_date"] . "</td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "Ei tuloksia.";
}
// Fetch details based on the search query 
if (isset($_GET['destination'])) {
    $search_whereto = $_GET['destination'];
    $sql_search = "SELECT id, name, email, phone, address, destination, passengers, arrival_date, departure_date FROM customers WHERE destination LIKE '%$search_whereto%' ORDER BY id";
    $result_search = $conn->query($sql_search);

    if ($result_search->num_rows > 0) {
        echo "<h2>Search Results for destination: $search_whereto</h2>";
        echo "<table border='1'>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Whereto</th>
                    <th>Howmany</th>
                    <th>Arrivals</th>
                    <th>Leaving</th>
                </tr>";
        while ($row_search = $result_search->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row_search["id"] . "</td>
                    <td>" . $row_search["name"] . "</td>
                    <td>" . $row_search["email"] . "</td>
                    <td>" . $row_search["phone"] . "</td>
                    <td>" . $row_search["address"] . "</td>
                    <td>" . $row_search["destination"] . "</td>
                    <td>" . $row_search["passengers"] . "</td>
                    <td>" . $row_search["arrival_date"] . "</td>
                    <td>" . $row_search["departure_date"] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No results found for Whereto: $search_whereto</p>";
    }
}
// Sulje yhteys
$conn->close();

?>
<br>
<form action="" method="GET">
    <label for="whereto">Search by Whereto:</label>
    <input type="text" name="destination" id="whereto">
    <input type="submit" value="Search">
</form>

</body>
</html>