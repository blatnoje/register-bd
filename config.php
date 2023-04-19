<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$dbname = "mysql-bd"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  header("Location: page1.html");
} else {
   echo "Invalid username or password";
}

$conn->close();
?>