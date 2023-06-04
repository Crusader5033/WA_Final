<?php
// login.php

// Retrieve the submitted username and password from the request
$username = $_POST['username'];
$password = $_POST['password'];

// Database connection settings
$servername = 'localhost';
$dbname = 'your_database_name';
$db_username = 'your_database_username';
$db_password = 'your_database_password';

try {
  // Create a new PDO instance for MSSQL
  $pdo = new PDO("sqlsrv:Server=$servername;Database=$dbname", $db_username, $db_password);
  
  // Set PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  // Prepare a SQL statement to retrieve the user record based on the provided username
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
  $stmt->execute(['username' => $username]);
  
  // Fetch the user record
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  
  // Check if a user with the provided username exists and verify the password
  if ($user && password_verify($password, $user['password'])) {
    // Authentication successful
    // Start the session
    session_start();
    
    // Store relevant user data in the session
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    
    // Return a success response
    http_response_code(200);
    echo json_encode(['message' => 'Login successful']);
  } else {
    // Authentication failed
    http_response_code(401);
    echo json_encode(['message' => 'Login failed']);
  }
} catch (PDOException $e) {
  // Database connection or query error
  http_response_code(500);
  echo json_encode(['message' => 'Database error: ' . $e->getMessage()]);
}
?>
