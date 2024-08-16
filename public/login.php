<?php
include('../config/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT id, nome, senha, tipo FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($senha, $user['senha'])) {
            $_SESSION['usuario_id'] = $user['id'];
            $_SESSION['nome'] = $user['nome'];
            $_SESSION['tipo'] = $user['tipo'];
            header("Location: dashboard.php");
            exit();
        }
    }
    $error = "Email ou senha inválidos!";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login - Controle de Estoque</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>
        <button type="submit">Entrar</button>
        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </form>
</body>
</html>
