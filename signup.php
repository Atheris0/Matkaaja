<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="app/scss/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <title>Matkaaja signup</title>
</head>
<body>
    <div class="signup">
        <h1>Sign Up</h1>
        <form action ="insert.php" method="POST">
        <label>First Name</label>
        <input type="text" name="firstname" required>
        <label>Last Name</label>
        <input type="text" name="lastname" required>
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Password</label>
        <input type="password" name="password"  id="password" oninput="checkPassword()" required>
        <div id="password-help" class="password-help"></div>
        <input type="submit" name="" value="Submit">
        </form>        
        <p>Already have an account? <a href="login.php">Login </a></p>
        </div>



<script>
    function checkPassword() {
        var passwordField = document.getElementById('password');
        var passwordHelp = document.getElementById('password-help');
        var password = passwordField.value;

        // Define password requirements
        var requirementsMessage = "Create a strong password: At least 8 characters, include uppercase/lowercase letters, a numeric digit, and special characters. Avoid predictable information.";

        // Check if password meets requirements
        if (password.length >= 8 && /[a-z]/.test(password) && /[A-Z]/.test(password) && /\d/.test(password) && /[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]/.test(password)) {
            passwordHelp.innerHTML = "";
        } else {
            passwordHelp.innerHTML = requirementsMessage;
        }
    }
</script>
    
</body>
</html>