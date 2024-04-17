<?php
// Database connection (adjust to your setup)
try {
    $db = new PDO('sqlite:mygamezone.db');
} catch (PDOException $e) {
    // Handle connection error
    echo "Error: " . $e->getMessage();
    die();
}

// Get form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Password hashing (use password_hash)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert User 
$stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
$stmt->execute([$username, $email, $hashed_password]);

// Redirect on success
header('Location: ../login.html'); // Redirect to login page 
