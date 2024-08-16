<?php
include('../config/config.php');
include('../includes/auth.php');

if (!is_master()) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $tipo = $_POST['tipo'];

    $sql = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $nome, $email, $senha, $tipo);
    $stmt->execute();
    header("Location: usuarios.php");
    exit();
}

$usuarios = $conn->query("SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Usuários - Controle de Estoque</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <h2>Usuários</h2>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="senha">Senha:</label>
        <input type="password" name="senha" required>
        <label for="tipo">Tipo:</label>
        <select name="tipo">
            <option value="master">Master</option>
            <option value="visualizacao">Visualização</option>
        </select>
        <button type="submit">Adicionar Usuário</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Tipo</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($usuario = $usuarios->fetch_assoc()): ?>
            <tr>
                <td><?php echo $usuario['id']; ?></td>
                <td><?php echo $usuario['nome']; ?></td>
                <td><?php echo $usuario['email']; ?></td>
                <td><?php echo $usuario['tipo']; ?></td>
                <td>
                    <a href="editar_usuario.php?id=<?php echo $usuario['id']; ?>">Editar</a>
                    <a href="excluir_usuario.php?id=<?php echo $usuario['id']; ?>">Excluir</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
