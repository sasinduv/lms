<?php

require_once 'conn.php';

session_start();

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    header("Location:login.php?error=1");
    exit;
}

$username = trim($_POST['username']);
$password = $_POST['password'];

// SHA256 hash
$user_input_hash = hash('sha256', $password);

// Escape username
$username = mysqli_real_escape_string($conn, $username);

// Select user from database
$sql = "SELECT * FROM users WHERE username='$username'";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

    // Compare hashed passwords
    if ($row['password'] === $user_input_hash) {

        $_SESSION['username'] = $row['username'];
        $_SESSION['role'] = $row['role'];

        // Redirect by role
        if ($row['role'] == 'admin') {
            header("Location:adminDashboard.php");
            exit;
        }

        if ($row['role'] == 'student') {
            header("Location:studentDashboard.php");
            exit;
        }

    } else {
        header("Location:login.php?error=1");
        exit;
    }

} else {
    header("Location:login.php?error=1");
    exit;
}

?>