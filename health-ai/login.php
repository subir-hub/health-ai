<?php
session_start();
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email === "" || $password === "") {
        echo '<div class="alert alert-warning">Please fill all fields.</div>';
        exit;
    }

    $sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {
            $_SESSION['user_email'] = $row['email'];
            $_SESSION['user_name'] = $row['name'];
            echo '<div class="alert alert-success">Login successful! Redirecting...</div>';
        } else {
            echo '<div class="alert alert-danger">Incorrect password!</div>';
        }
    } else {
        echo '<div class="alert alert-danger">User not found!</div>';
    }
}
?>
