<?php
$servername = "localhost";
$username = "wilson"; // Seu usuário do MySQL
$password = "c0ee9000fd0ee8b4052e2458e94c0c7c"; // Sua senha do MySQL
$dbname = "controle_estoque";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}
?>