<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "usersdb";

// Conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica erro
if ($conn->connect_error) {
  die("Erro de conexão: " . $conn->connect_error);
}

// Busca todos os usuários
$sql = "SELECT * FROM users";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Usuários Cadastrados</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      text-align: center;
      background-color: #f9f9f9;
    }
    table {
      margin: 20px auto;
      border-collapse: collapse;
      width: 60%;
    }
    th, td {
      border: 1px solid #ccc;
      padding: 8px;
    }
    th {
      background-color: #007bff;
      color: white;
    }
    a {
      display: inline-block;
      margin-top: 20px;
      background-color: #28a745;
      color: white;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
    }
    a:hover {
      background-color: #218838;
    }
  </style>
</head>
<body>
  <h2>Usuários Cadastrados</h2>

  <?php
  if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Nome</th><th>E-mail</th></tr>";
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["id"]."</td><td>".$row["name"]."</td><td>".$row["email"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "<p>Nenhum usuário cadastrado ainda.</p>";
  }

  $conn->close();
  ?>

  <a href="form.html">Voltar</a>
</body>
</html>