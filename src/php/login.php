<<?php


$username = $_POST['username'];
$password = $_POST['password'];


$servername = '193.85.203.188';
$dbname = 'prochazka6';
$db_username = 'prochazka6';
$db_password = 'dominik2005';

try {

  $pdo = new PDO("sqlsrv:Server=$servername;Database=$dbname", $db_username, $db_password);
  
 
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
  $stmt->execute(['username' => $username]);
  

  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  
  
  if ($user && password_verify($password, $user['password'])) {
    
    session_start();
    
    
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['username'] = $user['username'];
    

    http_response_code(200);
    echo json_encode(['message' => 'Login successful']);
  } else {
   
    http_response_code(401);
    echo json_encode(['message' => 'Login failed']);
  }
} 
?>
