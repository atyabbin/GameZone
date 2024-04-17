<?php
// Database connection (adjust)
try {
    $db = new PDO('sqlite:mygamezone.db');
} catch (PDOException $e) {
    // Handle connection error
    echo "Error: " . $e->getMessage();
    die();
}

// Get form data
$usernameOrEmail = $_POST['username'];
$password = $_POST['password'];

// Fetch user
$stmt = $db->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
$stmt->execute([$usernameOrEmail, $usernameOrEmail]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Verify password
if ($user && password_verify($password, $user['password'])) {
    // Start a session for logged-in user
    session_start(); 
    $_SESSION['user_id'] = $user['id'];
    header('Location: ../index.html'); // Redirect to the game zone
} else {
    // Handle login error - return to login with message
    header('Location: ../login.html?error=1'); 
}
