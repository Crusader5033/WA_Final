<?php
// registration.php

// Retrieve the submitted username and password from the request
$username = $_POST['username'];
$password = $_POST['password'];

// Database connection settings
$servername = '193.85.203.188';
$dbname = 'your_database_name';
$db_username = 'your_database_username';
$db_password = 'your_database_password';

try {
  // Create a new PDO instance for MSSQL
  $pdo = new PDO("sqlsrv:Server=$servername;Database=$dbname", $db_username, $db_password);
  
  // Set PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  // Prepare a SQL statement to insert the new user into the database
  $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
  
  // Hash the password
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  
  // Bind the parameters and execute the statement
  $stmt->execute(['username' => $username, 'password' => $hashedPassword]);
  
  // Registration successful
  http_response_code(200);
  echo json_encode(['message' => 'Registration successful']);
} catch (PDOException $e) {
  // Database connection or query error
  http_response_code(500);
  echo json_encode(['message' => 'Database error: ' . $e->getMessage()]);
}
?>
