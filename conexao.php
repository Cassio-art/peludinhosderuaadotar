<?php
$servername = "localhost";
$username = "root";
$password = "123456"; // sua senha do MySQL
$database = "trabalhoallanacachorroadocao"; // nome do banco

// Criar conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>
