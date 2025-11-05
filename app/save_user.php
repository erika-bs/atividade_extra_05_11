<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "usersdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Erro de conexão: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];

$sql = "INSERT INTO users (name, email) VALUES ('$name', '$email')";

if ($conn->query($sql) === TRUE) {
  echo "Usuário cadastrado com sucesso!";
} else {
  echo "Erro: " . $conn->error;
}

$conn->close();
?>