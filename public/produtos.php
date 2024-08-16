<?php
include('../config/config.php');
include('../includes/auth.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && is_master()) {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $quantidade = $_POST['quantidade'];

    $sql = "INSERT INTO produtos (nome, descricao, quantidade) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $nome, $descricao, $quantidade);
    $stmt->execute();
    header("Location: produtos.php");
    exit();
}

$produtos = $conn->query("SELECT * FROM produtos");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produtos - Controle de Estoque</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <h2>Produtos</h2>
    <?php if (is_master()): ?>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        <label for="descricao">Descrição:</label>
        <textarea name="descricao"></textarea>
        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" required>
        <button type="submit">Adicionar Produto</button>
    </form>
    <?php endif; ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Quantidade</th>
                <?php if (is_master()): ?>
                <th>Ações</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php while ($produto = $produtos->fetch_assoc()): ?>
            <tr>
                <td><?php echo $produto['id']; ?></td>
                <td><?php echo $produto['nome']; ?></td>
                <td><?php echo $produto['descricao']; ?></td>
                <td><?php echo $produto['quantidade']; ?></td>
                <?php if (is_master()): ?>
                <td>
                    <a href="editar_produto.php?id=<?php echo $produto['id']; ?>">Editar</a>
                    <a href="excluir_produto.php?id=<?php echo $produto['id']; ?>">Excluir</a>
                </td>
                <?php endif; ?>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
