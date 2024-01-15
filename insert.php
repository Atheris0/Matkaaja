<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

include 'cfg.php';

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Password condition: more than 8 characters, at least one capital letter, one small letter, and one special character
    $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

    if (preg_match($passwordRegex, $password)) {
        // Password meets the condition

        // Hash the password before storing it in the database
        //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";

    
        if (mysqli_query($conn, $query)){
            //echo "Registered successfully";
            header("Location: welcome.php?firstname=$firstname");
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        } 
    } else {
            echo "Create a strong password: At least 8 characters, include uppercase/lowercase letters, a numeric digit, and special characters. Avoid predictable information. Example: StrongP@ss123";
        }          


}
mysqli_close($conn);

?>

</body>
</html>