<?php
include('../config/config.php');
include('../includes/auth.php');

$acessos = $conn->query("SELECT ra.*, u.nome FROM relatorios_acesso ra JOIN usuarios u ON ra.usuario_id = u.id");
$estoque = $conn->query("SELECT * FROM produtos");
$pedidos = $conn->query("SELECT pm.*, p.nome FROM pedidos_material pm JOIN produtos p ON pm.produto_id = p.id");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Relatórios - Controle de Estoque</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include('../includes/header.php'); ?>
    <h2>Relatórios</h2>
    <h3>Acessos</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuário</th>
                <th>Data/Hora</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($acesso = $acessos->fetch_assoc()): ?>
            <tr>
                <td><?php echo $acesso['id']; ?></td>
                <td><?php echo $acesso['nome']; ?></td>
                <td><?php echo $acesso['data_hora']; ?></td>
                <td><?php echo $acesso['acao']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h3>Estoque</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Quantidade</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($produto = $estoque->fetch_assoc()): ?>
            <tr>
                <td><?php echo $produto['id']; ?></td>
                <td><?php echo $produto['nome']; ?></td>
                <td><?php echo $produto['descricao']; ?></td>
                <td><?php echo $produto['quantidade']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <h3>Pedidos de Material</h3>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($pedido = $pedidos->fetch_assoc()): ?>
            <tr>
                <td><?php echo $pedido['id']; ?></td>
                <td><?php echo $pedido['nome']; ?></td>
                <td><?php echo $pedido['quantidade']; ?></td>
                <td><?php echo $pedido['data']; ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    <?php include('../includes/footer.php'); ?>
</body>
</html>
