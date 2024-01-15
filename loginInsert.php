<?php
if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Yhdistä tietokantaan ja suorita kysely käyttäjän tarkistamiseksi
    $connection = new mysqli("localhost", "root", "", "matkaja");

    if ($connection->connect_error) {
        die("Yhteys tietokantaan epäonnistui: " . $connection->connect_error);
    }
    // Valmistele ja suorita kysely käyttäen prepared statementia
    $query = "SELECT firstname FROM users WHERE email = '$email' AND password = '$password'";
    $result = $connection->query($query);

    if ($result->num_rows === 1) {
        $users = $result->fetch_assoc();
        $firstname = $users['firstname'];
        // Kirjautuminen onnistui
        header("Location: welcome.php?firstname=$firstname");
    } else {
        echo "Käyttäjää ei löytynyt tai salasana ei täsmää";
        //header("Location: error.php");
    }   
} 


?>

    
