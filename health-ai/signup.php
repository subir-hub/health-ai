<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = trim($_POST["name"]);
    $email    = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Basic validation
    if (empty($name) || empty($email) || empty($password)) {
        echo '<span class="text-danger">All fields are required.</span>';
        exit;
    }

    // Check if email already exists
    $checkEmail = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($checkEmail) > 0) {
        echo '<span class="text-danger">Email already registered. Try logging in.</span>';
        exit;
    }

    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert user
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        echo '<span class="text-success">🎉 Signup successful! You can now log in.</span>';
    } else {
        echo '<span class="text-danger">Something went wrong. Please try again.</span>';
    }
}
?>
