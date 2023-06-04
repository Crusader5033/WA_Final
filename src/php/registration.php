<?php

$username = $_POST['username'];
$password = $_POST['password'];

$servername = '193.85.203.188';
$dbname = 'prochazka6';
$db_username = 'prochazka6';
$db_password = 'dominik2005';

try {
  $pdo = new PDO("sqlsrv:Server=$servername;Database=$dbname", $db_username, $db_password);
  
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
  
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  
  $stmt->execute(['username' => $username, 'password' => $hashedPassword]);
  
  http_response_code(200);
  echo json_encode(['message' => 'Registration successful']);
} 
?>
